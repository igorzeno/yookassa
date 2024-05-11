<template>
    <div id="content">
        <Header></Header>
        <search>
            <div id="search"></div>
        </search>

        <main>
            <div id="main">
                <div id="banner">
                    <img src="/img/banner.jpg" class="banner-img" alt="...">
                </div>
                <h3>Плитка</h3>
                <div id="products">
                    <div class="card" v-for="product in products">
                        <a href="product_detail.html">
<!--                                                        <img :src="(`/storage/images/${product.image}`)" class="card-img-top" alt="...">-->
                            <div class="card-body">
                                <p class="cat-text">{{ product.id }}</p>
<!--                                <p class="cat-text">{{ product.price }}</p>-->
                                <p class="cat-text">{{ product.name }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="main_btn">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                        Обратный звонок
                    </button>
                </div>
            </div>

            <Footer></Footer>

        </main>

        <RightFilter @filterProduct="fetchProductFilter"></RightFilter>

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
                        <h5 class="modal-title" id="enrollLabel">Заказать обратный звонок</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form id="sendEmail">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="col-form-label">
                                    Имя:
                                </label>
                                <input type="text" name="name" class="form-control" id="name"/>
                                <div class="err_name"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="col-form-label">Телефон:</label>
                                <input type="tel" name="tel" class="form-control" id="tel"/>
                                <div class="err_tel"></div>
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
                            <input type="submit" class="btn btn-primary" value="Отправить">
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
import RightFilter from "./../main/RightFilter";

import ProductService from "../../services/ProductService";

export default {
    data() {
        return {
            products: [],
            filterArr:[],
        }
    },
    async mounted() {
        await this.fetchProductFilter(this.filterArr);
    },
    methods: {
        // async fetchData() {
        //  //   alert(this.filterArr);
        //     let response = await ProductService.getIndex();
        //
        //     if (response) {
        //         this.products = response.data;
        //     } else {
        //         alert('Произошла ошибка!')
        //     }
        // },
        async fetchProductFilter(filterArr) {
          //  alert(filterArr.colors);
            let response = await ProductService.getProductFilter(filterArr);

            if (response) {
                this.products = response.data;
            } else {
                alert('Произошла ошибка!')
            }
        }
    },
    computed: {},
    components: {
        Header,
        Footer,
        RightFilter
    }
}

document.addEventListener("DOMContentLoaded", function (event) {
    document.querySelectorAll('.form-check-input').forEach((item) => {
        const top = document.querySelector('#button_search');
        item.addEventListener('click', (event) => {
            const position_top = (event.target.offsetTop - 16) + "px";
            top.style.top = position_top;
            top.style.opacity = 1;
            // const a = document.querySelector('#button_a');
            // a.href = "http://example.com/" + 5 + "/" + 111;

            if (top.style.opacity == 1) {
                const time = setTimeout(() => {
                    top.style.opacity = 0
                }, 3000);
              //  console.log(time);
            }
        });
    });
});
</script>

<style scoped>

</style>
