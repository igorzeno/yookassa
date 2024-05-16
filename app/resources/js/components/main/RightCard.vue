<template>
    <aside>
        <div id="aside_product">
            <h5>Итого:</h5><br>
            <p class="product_title">5 товаров на 9600 руб.</p>
            <hr class="product_hr">
        </div>
        <div class="main_btn">
            <button class="btn btn-warning card_btn" data-bs-toggle="modal" data-bs-target="#enroll">
                Оформить заказ
            </button>
        </div>
    </aside>
</template>

<script>

import ProductService from "../../services/ProductService";

export default {
    // data() {
    //
    // },
    // methods: {
    //     async countProduct() {
    //
    //     }
    // }
}
</script>

<style scoped>

</style>
