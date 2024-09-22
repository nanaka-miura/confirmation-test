<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['男性','女性','その他']),
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->word,
            'category_id' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->randomElement([
                'お問い合わせありがとうございます。ご質問がある場合は、いつでもご連絡ください。',
                '商品の受け取りについてのお問い合わせです。',
                '返品の手続きについて教えてください。',
                'サポートが必要です。製品の使用方法を教えてください。',
                'クーポンの適用についての質問です。',
                '注文のキャンセルを希望しています。'
            ])
        ];
    }
}
