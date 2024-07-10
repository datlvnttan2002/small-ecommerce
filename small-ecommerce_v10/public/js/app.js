$(() => {
    const menuCategory = $("#menu_categories");
    const elementLoadingSpinner = $(
        '<div class="loading-spinner" id="loadingSpinner"></div>'
    );
    const menuUlMain = $("#menu-ul-main");
    menuCategory.data("change", false);
    window.HEADER = {
        category: function () {
            new CallApi(route("api.category.index")).all(
                (res) => {
                    console.log(res);
                    dataCategoryHierarchy = HEADER.categoryHierarchy(res.data);
                    HEADER.renderDataCategory(
                        dataCategoryHierarchy,
                        menuUlMain
                    );
                    menuCategory.data("change", true);
                    elementLoadingSpinner.remove();
                },
                (res) => {
                    console.log(res);
                }
            );
        },
        categoryHierarchy: function (categories, parentCategoryId = null) {
            let arr = [];
            var i = 0;
            while (i < categories.length) {
                if (categories[i].parent_category_id === parentCategoryId) {
                    category = categories.splice(i, 1)[0];
                    arr.push({
                        id: category.id,
                        name: category.category_name,
                        childrens: HEADER.categoryHierarchy(
                            categories,
                            category.id
                        ),
                    });
                    i = 0;
                } else i++;
            }
            return arr;
        },
        renderDataCategory: function (
            dataCategoryHierarchy,
            element,
            deep = 1
        ) {
            for (const category of dataCategoryHierarchy) {
                var elementLi = $(`<li></li>`);
                if (category.childrens.length > 0 && deep < 5) {
                    elementLi.append(
                        `<span><a href="#${category.id}"${category.name}</a></span>`
                    );
                    var elementUl = $("<ul></ul>");
                    HEADER.renderDataCategory(
                        category.childrens,
                        elementUl,
                        deep + 1
                    );
                    elementLi.append(elementUl);
                } else {
                    elementLi.append(
                        `<a href="#${category.id}"${category.name}</a>`
                    );
                }
                element.append(elementLi);
            }
        },
    };
    menuCategory.mouseenter(() => {
        if (!menuCategory.data("change")) {
            menuUlMain.append(elementLoadingSpinner);
            elementLoadingSpinner.show();
            HEADER.category();
        }
    });
});
