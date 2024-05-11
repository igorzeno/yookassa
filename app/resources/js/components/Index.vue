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
                <h3>Элит Маркет</h3>
                <div id="categories">
                    <div class="card">
                        <img src="/img/ico-plitca.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Плитка</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Плитка</p>
                            <p class="cat-text"><a href="/products">Керамическая плитка</a></p>
                            <p class="cat-text"><a href="/products">Керамогранит</a></p>
                            <p class="cat-text"><a href="/products">Мозаика</a></p>
                            <p class="cat-text"><a href="/products">Керамогранит</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="/img/ico-sant.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Сантехника</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Сантехника</p>
                            <p class="cat-text"><a href="/products">Аксессуары</a></p>
                            <p class="cat-text"><a href="/products">Ванны</a></p>
                            <p class="cat-text"><a href="/products">Раковины</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/img/ico-svet.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Светильники</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Светильники</p>
                            <p class="cat-text"><a href="/products">Люстры</a></p>
                            <p class="cat-text"><a href="/products">Светильники</a></p>
                            <p class="cat-text"><a href="/products">Торшеры</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/img/ico-oboi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Обои</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Обои</p>
                            <p class="cat-text"><a href="/products">Керамическая плитка</a></p>
                            <p class="cat-text"><a href="/products">Керамогранит</a></p>
                            <p class="cat-text"><a href="/products">Мозаика</a></p>
                            <p class="cat-text"><a href="/products">Керамогранит</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/img/ico-stor.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Ткани</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Ткани</p>
                            <p class="cat-text"><a href="/products">Люстры</a></p>
                            <p class="cat-text"><a href="/products">Светильники</a></p>
                            <p class="cat-text"><a href="/products">Торшеры</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/img/ico-park.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="cat-title">Паркет</p>
                        </div>
                        <div class="card-hover">
                            <p class="cat-title">Паркет</p>
                            <p class="cat-text"><a href="/products">Люстры</a></p>
                            <p class="cat-text"><a href="/products">Светильники</a></p>
                            <p class="cat-text"><a href="/products">Торшеры</a></p>
                            <hr>
                            <p class="cat-text"><a href="/products">Подробнее</a></p>
                        </div>
                    </div>
                </div>
                <h4>Специальное предложение:</h4>
                <div id="categories2">
                    Представляем обои с рисунком из букв, надписей, текстов с фото в интерьере, оптимальными ценами. Огромное число дизайнов, различных по цвету, фактуре в интернет-магазине с быстрой доставкой. Каталоги представлены на сайте и в нашем магазине, быстрая доставка по Москве и России. Консультации, гарантии. ... Причем, тексты на обоях могут быть различными по стилистике и стать частью множества решений: - осмысленные фразы, которые несут мотивационную.
                </div>
                <div class="main_btn">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                        Обратный звонок
                    </button>
                </div>
            </div>

            <Footer></Footer>

        </main>

        <RightColumn></RightColumn>

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
import Header from "./main/Header";
import Footer from "./main/Footer";
import RightColumn from "./main/RightColumn";

export default {
    name: "index",
    data() {
        return {

        }
    },

    computed: {},
    components: {
        Header,
        Footer,
        RightColumn
    }
}
</script>

<style scoped>

</style>
