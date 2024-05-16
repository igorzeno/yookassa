<template>
    <div id="content">
        <Header></Header>
        <search>
            <div id="search"></div>
        </search>

        <main>
            <div id="main">
                <div id="card_column">
                    <div class="card_panel">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="2p">
                            <label class="form-check-label" for="2p">
                                Выбрать все
                            </label>
                        </div>
                        <div class="card_panel_end"><button type="button" class="btn card_btn_del">Удалить выбранные</button></div>
                    </div>
                    <div class="card_panel">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="1p">
                        </div>
                        <div id="card_avatar">
                            <img src="/storage/images/2977.jpg" class="card_ava" alt="...">
                        </div>
                        <div class="card_panel_text">
                            <div class="">Atelier Gold</div>
                            <button type="button" class="btn card_btn_del">Удалить</button>
                        </div>
                        <div class="count-buttons">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card_panel_end">5600 руб.</div>
                    </div>
                    <div class="card_panel">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="3p">
                        </div>
                        <div id="card_avatar">
                            <img src="/storage/images/2966.jpg" class="card_ava" alt="...">
                        </div>
                        <div class="card_panel_text">
                            <div class="">Atelier Gold длинное название</div>
                            <button type="button" class="btn card_btn_del">Удалить</button>
                        </div>
                        <div class="count-buttons">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card_panel_end">5600 руб.</div>
                    </div>
                </div>



            </div>

            <Footer></Footer>

        </main>

        <RightCard></RightCard>

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
import RightCard from "./../main/RightCard";

import ProductService from "../../services/ProductService";

export default {
    data() {
        return {
            productId: {},
            product: {},
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
            } else {
                alert('Произошла ошибка!')
            }
        }
    },
    computed: {},
    components: {
        Header,
        Footer,
        RightCard
    }
}

</script>

<style scoped>

</style>
