<template>
    <div id="content">
        <Header></Header>
        <search>
            <div id="search"></div>
        </search>

        <main>
            <div id="main">
                <div id="product_column">
                    <div id="product_avatar">
                        <img :src="(`/storage/images/2966.jpg`)" class="product_ava" alt="...">
                        <img :src="(`/storage/images/7497.jpg`)" class="product_ava" alt="...">
                        <img :src="(`/storage/images/2962.jpg`)" class="product_ava" alt="...">
                        <img :src="(`/storage/images/2977.jpg`)" class="product_ava" alt="...">
                    </div>
                    <div id="product_foto">
                        <img :src="'/storage/images/' + product.image"  class="product_img" alt="...">
                    </div>
                </div>
                <div id="product_column2">
                    <div id="product_text1">
                        <p class="product_title">Артикул:</p>
                        <p class="product_text">{{ product.name}}</p>
                    </div>
                    <div id="product_text2">
                        <hr class="product_hr">
                        <p class="product_title">Информация о товаре:</p>
                        <p class="product_text">{{ product.desc}}</p>
                    </div>
                    <div id="product_text3">
                        <hr class="product_hr">
                        <p class="product_title">Отзывы:</p>
                        <p class="product_text reviews"><b>Иванов</b> 24.05.2021<br>- {{ product.desc}}</p>
                        <p class="product_text reviews"><b>Петров Вася</b> 24.05.2021<br>- {{ product.desc}}</p>
                        <p class="product_text reviews"><b>Матрена</b> 24.01.2023<br>- {{ product.desc}}</p>
                        <hr class="product_hr">
                    </div>
                </div>
            </div>

            <Footer></Footer>

        </main>

        <aside>
            <div id="aside_product">
                <h5>Atelier Gold</h5><br>
                <p class="product_title">Цена:</p>
                <p class="product_text">{{ product.price }}</p>
                <hr class="product_hr">
                <p class="product_title">Бренд:</p>
                <p class="product_text">{{ product.brand }}</p>
                <hr class="product_hr">
                <p class="product_title">SKU:</p>
                <p class="product_text">{{ product.sku }}</p>
                <hr class="product_hr">
                <p class="product_title">Ваша скидка:</p>
                <p class="product_text discount">{{ discountName }}: {{ discountPercent }} %</p>
                <hr class="product_hr">
            </div>
            <div class="main_btn">
                <a :href="`/card`"><button class="btn btn-success">
                    Перейти в корзину
                </button></a>
            </div>
            <div class="main_btn">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                    Добавить в корзину
                </button>
            </div>
        </aside>

        <div
            class="modal fade"
            id="enroll"
            tabindex="-1"
            aria-labelledby="enrollLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="enrollLabel">Товар добавлен</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form id="">
                        <div class="modal-body modal-text">
                            <div class="mb-3">
                                <img class="modal-img" src="/img/ico-ok.png">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Закрыть
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "./../main/Header";
import Footer from "./../main/Footer";
import RightDetail from "./../main/RightDetail";

import ProductService from "../../services/ProductService";

export default {
    props: [
        'propsProductId',
    ],
    data() {
        return {
            productId: {},
            product: {},
            discountName: 'Скидки нет',
            discountPercent: '',
        }
    },
    async mounted() {
        await this.fetchProduct();
    },
    methods: {
        async fetchProduct() {
            let response = await ProductService.getProduct({product: this.propsProductId});

            if (response) {
                this.product = response.data;
                if(this.product.discount){
                    this.discountName = this.product.discount.name;
                    this.discountPercent = this.product.discount.discount_percent;
                }
                if(this.product.scu){
                    this.scu = this.product.scu;
                }
            } else {
                alert('Произошла ошибка!')
            }
        }
    },
    computed: {},
    components: {
        Header,
        Footer,
        RightDetail
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
    const img = document.querySelector('.product_img');
    document.querySelectorAll('.product_ava').forEach((item) => {
        item.addEventListener('click', (event) => {
            if(img){
                img.src = item.src;
                top.style.opacity = 1;
            }
        });
    });
});

</script>

<style scoped>

</style>
