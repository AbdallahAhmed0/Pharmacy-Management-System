@extends('layouts.admin.main')

@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 25px">Sales</h1>
                    </div>
                    <div class="page-title" style="margin-top: -20px">
                        <ol class="breadcrumb text-right" style="font-size: 17px">
                            <li><a href="{{ route('sales.index') }}">Sales</a></li>
                            <li>Add sales</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    function delFild(id) {
        var elem = document.getElementById('input-' + id);
        elem.parentNode.removeChild(elem);
        var elem = document.getElementById('sel-' + id);
        elem.parentNode.removeChild(elem);
        var elem = document.getElementById('div-' + id);
        elem.parentNode.removeChild(elem);
        return false;
    }
</script>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body custom-edit-service">
                        @if($errors->any())
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $err)
                                    <li>{{$err}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <strong>Creat sale</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('sales.store')}}">
                                    @csrf




                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer Name <span class="text-danger">*</span></label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="customer_name" value="{{old('customer_name')}}" class="form-control"><small class="form-text text-muted"></small></div>
                                    </div>
                                    <div class="row form-group" id='drug'>
                                        <div class="col col-md-4">
                                            <div class="form-group">
                                                <input type="button" value="add drug" id='btn' class="btn btn-primary">
                                            </div>
                                        </div>
                                        <div class="col  col-md-4"><label for="select" class=" form-control-label">Product</label></div>
                                        <div class="col col-md-4"><label for="select" class=" form-control-label">Quantity</label></div>

                                    </div>

                                    <div class="row">
                                        <div class="submit-section col-12">
                                            <input type="submit" value="Add Sale" name="add"
                                                class="btn btn-primary btn-block">
                                        </div>
                                    </div>

                                    <script>
                                        (function() {
                                            var counter = 0;
                                            // var options = [<?php //foreach ($Prodect_names as $Prodect) {
                                                                //                     echo $Prodect['id'] . ",";
                                                                //                 }
                                                                ?>];

                                            var options2 = [<?php foreach ($Prodect_names as $Prodect) {
                                                                foreach ($Purchases_names as $pName) {
                                                                    if ($pName['id'] == $Prodect['purchase_id']) {
                                                                        if ($pName['quantity'] > 0) {
                                                                            echo "{name: '" . $pName['product'] . "' ,";
                                                                            echo "id: '" . $Prodect['id'] . "'},";
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            } ?>];
                                            var btn = document.getElementById('btn');
                                            var quantity = document.getElementById('drug');
                                            var drug = document.getElementById('drug');

                                            var addDelBtn = function() {
                                                ++counter;
                                                let div = document.createElement("div");
                                                div.className = "col col-md-3";
                                                div.id = "div-" + counter;
                                                drug.appendChild(div);
                                                let delBtn = document.createElement("input");
                                                delBtn.value = "delete filed";
                                                delBtn.type = "button";
                                                delBtn.id = "del-" + counter;
                                                delBtn.className = "btn btn-danger";
                                                delBtn.onclick = function() {
                                                    delFild(counter);
                                                    --counter;
                                                };
                                                div.appendChild(delBtn);

                                            };
                                            var addDrug = function() {
                                                var input = document.createElement("select");
                                                input.id = 'sel-' + counter;
                                                input.className = ' col-6 col-md-4';
                                                input.style = 'margin:10px;padding=10px;width=150px';
                                                // for (let i = 0; i < options.length; i++) {
                                                //     var opt = document.createElement('option');
                                                //     opt.value = options[i];
                                                //     opt.innerHTML = options[i];
                                                //     input.appendChild(opt);
                                                // }
                                                for (let i = 0; i < options2.length; i++) {
                                                    var opt = document.createElement('option');
                                                    opt.value = options2[i].id;
                                                    opt.innerHTML = options2[i].name;
                                                    input.appendChild(opt);
                                                }
                                                input.name = 'product[]';
                                                input.placeholder = 'drug';
                                                drug.appendChild(input);
                                            };
                                            var addQuantity = function() {
                                                var input = document.createElement("input");
                                                input.id = 'input-' + counter;
                                                input.type = 'text';
                                                input.className = 'col-6 col-md-4';
                                                input.name = 'quantity[]';
                                                input.placeholder = 'quantity of procect';
                                                quantity.appendChild(input);
                                            };
                                            btn.addEventListener('click', function() {
                                                addDelBtn();
                                                addDrug();
                                                addQuantity();
                                            }.bind(this));
                                        })();
                                    </script>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
@endsection
