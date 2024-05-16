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
                    <p class="cat-title">Выбрать:</p>
                </div>
                <div class="form-check" v-for="tag in tags" @change="countProduct">
                    <input v-model="selectedTags"  :value="tag.id"
                           class="form-check-input" type="checkbox">
                    <label>{{ tag.title }}</label>
                </div>
            </div>
            <div id="button_search"
                 v-on:click="getFilterProducts">
                <div id="button_dop">Показать <span v-if="this.countP"> : {{ this.countP }}</span></div>
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

    data() {
        return {
            categories: [
                {id: 1, title: 'Настольные', checked: false},
                {id: 2, title: 'Абажур', checked: false},
                {id: 3, title: 'Классика', checked: false}
            ],
            selectedCategories: [],
            tags: [
                {id: 1, title: 'Новинки', checked: false},
                {id: 2, title: 'Популярные', checked: false},
                {id: 3, title: 'Распродажа', checked: false}
            ],
            selectedTags: [],
            countP: 0,
        };
    },
        methods: {
            async countProduct() {
                var countProduct = {
                    category: this.selectedCategories,
                    tags: this.selectedTags
                };
              //  console.log(countProduct);
                let response = await ProductService.getCountProduct(countProduct);

                if (response) {
                    this.countP = response.count;
                } else {
                    alert('Произошла ошибка!')
                }
            },
            getFilterProducts() {
                var obFilterProduct = {
                    category: this.selectedCategories,
                    tags: this.selectedTags
                };
               // console.log(obFilterProduct);
                this.$emit('filterProduct', obFilterProduct);
            }
        }
    }
</script>

<style scoped>

</style>
