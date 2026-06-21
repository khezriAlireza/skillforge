<?php

namespace Tests\Feature;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class StripePaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Configure dummy credentials for testing
        config(['services.stripe.key' => 'pk_test_mock']);
        config(['services.stripe.secret' => 'sk_test_mock']);
    }

    public function test_checkout_redirects_to_stripe(): void
    {
        $user = User::factory()->create();
        
        $category = Category::create(['name' => 'Test Category', 'image' => 'test.jpg']);
        $subCategory = SubCategory::create(['name' => 'Test Subcategory', 'category_id' => $category->id]);
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100.00,
            'discount' => 10,
            'category_id' => $category->id,
            'sub_category_id' => $subCategory->id,
            'stock' => 10,
            'active' => 1,
        ]);

        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        // Mock Stripe Checkout Session
        $sessionMock = Mockery::mock('alias:Stripe\Checkout\Session');
        $sessionMock->shouldReceive('create')
            ->once()
            ->andReturn((object)[
                'id' => 'cs_test_mock_123',
                'url' => 'https://checkout.stripe.com/pay/cs_test_mock_123'
            ]);

        $response = $this->actingAs($user)
            ->post(route('cart.checkout'));



        // Assert redirect to Stripe url
        $response->assertRedirect('https://checkout.stripe.com/pay/cs_test_mock_123');

        // Assert order was created in database as pending
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => 180.00, // (100 - 10% discount) * 2 quantity
        ]);
    }

    public function test_payment_success_callback_completes_order(): void
    {
        $user = User::factory()->create();
        
        $category = Category::create(['name' => 'Test Category', 'image' => 'test.jpg']);
        $subCategory = SubCategory::create(['name' => 'Test Subcategory', 'category_id' => $category->id]);
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100.00,
            'discount' => 10,
            'category_id' => $category->id,
            'sub_category_id' => $subCategory->id,
            'stock' => 10,
            'active' => 1,
        ]);

        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => 180.00,
        ]);

        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => 90.00,
        ]);

        // Mock Stripe Checkout Session Retrieve
        $sessionMock = Mockery::mock('alias:Stripe\Checkout\Session');
        $sessionMock->shouldReceive('retrieve')
            ->once()
            ->with('cs_test_mock_123')
            ->andReturn((object)[
                'payment_status' => 'paid',
            ]);

        $response = $this->actingAs($user)
            ->get(route('payment.success', ['order' => $order->id, 'session_id' => 'cs_test_mock_123']));

        // Assert redirect to order list
        $response->assertRedirect(route('customer.order.list'));

        // Assert order status is completed
        $this->assertEquals('completed', $order->fresh()->status);

        // Assert stock decremented by 2 (10 - 2 = 8)
        $this->assertEquals(8, $product->fresh()->stock);

        // Assert cart was cleared
        $this->assertDatabaseMissing('cart_items', [
            'user_id' => $user->id,
        ]);
    }

    public function test_payment_cancel_callback_cancels_order(): void
    {
        $user = User::factory()->create();
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => 100.00,
        ]);

        $response = $this->actingAs($user)
            ->get(route('payment.cancel', ['order' => $order->id]));

        // Assert redirect to cart index
        $response->assertRedirect(route('cart.index'));

        // Assert order status is canceled
        $this->assertEquals('canceled', $order->fresh()->status);
    }
}
