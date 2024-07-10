const getParamPrefix = (index = 0) => {
    var currentURL = window.location.toString();
    var t = currentURL.split("/");
    return t[t.length - 1 - index];
};
window.HELPER = {
    buildProductItem: (product,saleTime = null) => {
        let html = `<div class="item">
                        <div class="grid_item">
                            <div class="ribbon-group">`;
        if (product.created_at !== null) {
            creteadAt = new Date(product.created_at);
            creteadAt.setDate(creteadAt.getDate() + 7);
            if (creteadAt >= new Date())
                html += '<span class="ribbon new">New</span>';
        }
        if (product.discount !== null && product.discount > 0)
            html += `<span class="ribbon off">-${parseInt(
                product.discount * 100
            )}%</span>`;
        html += `
                    </div>
                    <figure>
                        <a href="product-detail-1.html">
                            <img class="owl-lazy" src="img/products/${product.cover_image}" data-src="img/products/shoes/4.jpg" alt="">
                        </a>
                        ${saleTime ? `<div data-countdown="${HELPER.convertDateToString(saleTime)}" class="countdown"></div>` : ''}
                    </figure>
                    <div class="rating">`;
        averageRating = Math.ceil(product.average_rating);
        for (var i = 0; i < 5; i++)
            html += `<i class="icon-star ${i<averageRating ? 'voted' : ''}"></i>`;
        html += `</div>
                    <a href="product-detail-1.html">
                        <h3>${product.product_name.charAt(0).toUpperCase() + product.product_name.slice(1)}</h3>
                    </a>
                    <div class="price_box">`;
        if (product.discount > 0)
            html += `
                        <span class="new_price">$${(
                            product.price -
                            product.price * product.discount
                        ).toFixed(2)}</span>
                        <span class="old_price">$${product.price}</span>
                    `;
        else
            html += `
                        <span class="new_price">$${product.price}</span>
                    `;
        html += `
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>`;
        return $(html);
    },
    convertDateToString: (date)=>{
        return new Date(date).toISOString().split('T')[0];
    },
    convertDateTimeToString: (date)=>{
        let valueTime = new Date(date).toISOString();
        let vls = valueTime.split("T");
        valueTime = vls[0] +" "
        vls = vls[1].split(":");
        valueTime+=vls[0]+":"+vls[1];
        return valueTime;
    }
};
