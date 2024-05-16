<template>
    <aside>
        <div id="aside_product">
            <h5>Atelier Gold</h5><br>
            <p class="product_title">Цена:</p>
            <p class="product_text">{{ myObject.name }}</p>
            <hr class="product_hr">
            <p class="product_title">Общее</p>
            <p class="product_text">Atelier Gold-это произведение искусства</p>
            <hr class="product_hr">
            <p class="product_title">Цвет</p>
            <p class="product_text">Красный</p>
            <hr class="product_hr">
            <p class="product_title">Размер</p>
            <p class="product_text">Atelier Gold-это произведение искусства</p>
            <hr class="product_hr">
        </div>
        <div class="main_btn">
            <a :href="`/card`"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#enroll">
                В корзину
            </button></a>
        </div>
        <div class="main_btn">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                Добавить в корзину
            </button>
        </div>
    </aside>
</template>

<script>

import ProductService from "../../services/ProductService";

export default {
    props: ['myObject'],
    data() {
        return {
            product: {},
        }
    },
    async mounted() {
      // console.log(this.myObject);
      //   await this.fetchProduct();
    },
    methods: {
        //async countProduct() {

        // }
    }
}
</script>

<style scoped>

</style>
