<!DOCTYPE html>

<body>
    <div class="row">
        <div class="card mb-3">
            <h1>Purchase made successfully</h1>
            @foreach ($products as $product)
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div><img src="storage/upload/product_1679239044.jpg" class="img-fluid rounded-3"
                                    alt="Shopping item" style="width: 65px;"></div>
                            <div class="ms-3">
                                <h5>{{ $product['name'] }}</h5>
                                <p class="small mb-0">{{ $product['details'] }}o</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">{{ $product['qt'] }}</h5>
                            </div>
                            <div style="width: 80px;">
                                <h5 class="mb-0">{{ $product['price'] }}€</h5>
                            </div><a href="#!" data-darkreader-inline-color=""
                                style="color: rgb(206, 206, 206); --darkreader-inline-color:#c9c4bd;"><i
                                    class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
