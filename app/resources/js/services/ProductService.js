import Api from "./api";

class ProductService {
    api = new Api();

    getIndex(params) {
        return this.api.get('/api/product/get-index', params)
    }

    getProductFilter(params) {
        return this.api.get('/api/product/get-filter-products', params)
    }

    getCountProduct(params) {
        return this.api.get('/api/product/get-count-products', params)
    }
}

export default new ProductService();
