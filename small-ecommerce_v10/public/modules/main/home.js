$(() => {
    const divProductFlashSale = $("#product_flash_sale_box");
    const divProductNew = $("#product_new_box");
    const divCategoryHot = $("#categories-hot");
    window.HOME = {
        getProductFlashSales: () => {
            new CallApi(route("api.product-flash-sale.index")).all(
                (res) => {
                    res.data.data.forEach((product) => {
                        productItemElement = HELPER.buildProductItem(product);
                        divProductFlashSale.append(productItemElement);
                    });
                    // run();
                },
                (res) => {}
            );
        },
        getNewProducts: () => {
            new CallApi(route("api.product.index")).get(
                (res) => {
                    res.data.data.forEach((product) => {
                        productItemElement = HELPER.buildProductItem(product);
                        divProductNew.append(productItemElement);
                    });
                },
                (res) => {},
                {
                    tag: "new",
                }
            );
        },
        getHotCategories: function () {
            new CallApi(route("api.category.index")).get(
                (res) => {
                    console.log(res);
                    res.data.forEach((category) => {
                        divCategoryHot.append(`<div class="item-category-hot">
                                                    <a href="#0">
                                                        <center>${category.category_name}</center>
                                                    </a>
                                                </div>`);
                    });
                    run();
                },
                (res) => {},
                {
                    tag: "hot",
                }
            );
        },
    };
    HOME.getProductFlashSales();
    HOME.getNewProducts();
    HOME.getHotCategories();
});
