<template>
    <aside>
        <div id="aside">
            <div class="category-filter">
                <div class="card-filter">
                    <p class="cat-title">Категория:</p>
                </div>
                <div class="form-check" v-for="category in categories" @change="countProduct">
                    <input v-model="selectedCategories"   :value="category.id"
                           class="form-check-input" type="radio">
                    <label>{{ category.title }}</label>
                </div>
            </div>

            <div class="category-filter">
                <div class="card-filter">
                    <p class="cat-title">Цвет:</p>
                </div>
                <div class="form-check" v-for="color in colors" @change="countProduct">
                    <input v-model="selectedColors"  :value="color.id"
                           class="form-check-input" type="checkbox">
                    <label>{{ color.title }}</label>
                </div>
            </div>
            <div id="button_search"
                 v-on:click="getFilterProducts">
                <div id="button_dop">Показать {{this.countP}}</div>
            </div>

        </div>
        <div id="aside2">
        </div>
    </aside>
</template>

<script>

import ProductService from "../../services/ProductService";

export default {
    name: "RightFilter",
    // productsCount: ["productsCount"],
    data() {
        return {
            categories: [
                {id: 1, title: 'Настольные', checked: false},
                {id: 2, title: 'Абажур', checked: false},
                {id: 3, title: 'Классика', checked: false}
            ],
            selectedCategories: [],
            colors: [
                {id: 1, title: 'Новинки', checked: false},
                {id: 2, title: 'Популярные', checked: false},
                {id: 3, title: 'Скидки', checked: false},
                {id: 4, title: 'Распродажа', checked: false}
            ],
            selectedColors: [],
            countP: 0,
        };
    },
        methods: {
            async countProduct() {
                var countProduct = {
                    categories: this.selectedCategories,
                    colors: this.selectedColors
                };
                console.log(countProduct);
                let response = await ProductService.getCountProduct(countProduct);

                if (response) {
                    this.countP = 0;
                } else {
                    alert('Произошла ошибка!')
                }
            },
            getFilterProducts() {
                var obFilterProduct = {
                    categories: this.selectedCategories,
                    colors: this.selectedColors
                };
                this.$emit('filterProduct', obFilterProduct);
            }
        }
    }
</script>

<style scoped>

</style>
