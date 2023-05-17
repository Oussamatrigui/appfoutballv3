<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css_detait/detait.css" />
    <title>Product Card UI</title>
</head>

<body>
    @foreach ($products as $product)
        <div class="card">
            <div class="product-details">
                <div class="titre">
                    <h1>{{ $product->product_name }}</h1>
                    <span>COD: 3299</span>
                </div>
                <div class="price">€<span>{{ $product->product_price }}</span></div>
                <div class="variant">

                </div>
                <div class="variant">
                    <h3>TAILLE</h3>
                    <ul>
                        <li>S</li>
                        <li>M</li>
                        <li>L</li>
                        <li>XL</li>
                        <li>XXL</li>
                    </ul>
                </div>
                <bUtton class="action-btn">Ajouter au panier
                </bUtton>
            </div>
            <div class="imgContainer">
                <div class="imgBox">
                    <img src="/storage/product_images/{{ $product->product_image }}" alt="">
                </div>
            </div>
        </div>
    @endforeach


</body>

</html>
