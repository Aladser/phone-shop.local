<?php

namespace App\Http\Controllers;

use App\Models\BasketPhone;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Телефоны корзины
class BasketPhoneController extends Controller
{
    // добавить в корзину
    public function store(Request $request)
    {
        $data = $request->all();
        $phone_name = $data['name'];

        $phone = Phone::where('name', $phone_name);
        if ($phone->exists()) {
            // ---добавление телефона в корзину---
            $phone_id = $phone->first()->id;
            $user_id = Auth::user()->id;
            // поиск этого телефона у пользователя в корзине
            $basketPhone = BasketPhone::where('user_id', $user_id)->where('phone_id', $phone_id);

            // добавление в корзину
            if ($basketPhone->exists()) {
                $basketPhone = $basketPhone->first();
                ++$basketPhone->count;
            } else {
                $basketPhone = new BasketPhone();
                $basketPhone->phone_id = $phone_id;
                $basketPhone->user_id = $user_id;
                $basketPhone->count = $data['count'];
            }

            $isAdded = $basketPhone->save();
            if ($isAdded) {
                echo json_encode(['result' => 1, 'count' => $basketPhone->count]);
            } else {
                echo json_encode(['result' => 0, 'description' => 'серверная ошибка добавления пользователя']);
            }
        } else {
            echo json_encode(['result' => 0, 'description' => "товар $phone_name не существует"]);
        }
    }
}
