@extends('layouts.layout')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<div class="container" style="margin-top: 20px;">
    <div class="col-lg-9">
        <table class="table table-bordered" id="cart">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Đơn vị __hidden</th>
                    <th>Đơn vị quy đổi __hidden</th>
                    <th>Đơn vị</th>
                    <th>conversion_value __hidden</th>
                    <th>quantity_whole __hidden</th>
                    <th>price_whole __hidden</th>
                    <th>Tồn kho</th>
                    <th>Giá gốc</th>
                    <th>Giảm giá</th>
                    <th>Giá bán</th>
                    <th>Số lượng mua</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
            </thead>
        </table>
    </div> 
    <div class="col-lg-3 card" style="margin-top:35px; padding: 0;">
        <div class="buy-header">
            <span class="buy-title">Thanh toán</span>
        </div>
            <div class="buy-body">
                <div class="buy-body-element">
                    <span class="buy-body-name">Tổng tiền:</span>
                    <span class="buy-body-value totalCart">0</span><span>đ</span>
                </div>
                <div class="buy-body-element">
                    <span class="buy-body-name">VAT:</span>
                    <span class="buy-body-value">
                        <input type="text" class="buy-body-value-input vat" name="ccdates" value="0">
                    </span>
                </div>
                <div class="buy-body-element">
                    <span class="buy-body-name">Tổng thanh toán:</span>
                    <span class="buy-body-value money">0</span><span>đ</span>
                </div>
        </div>
    </div>
</div>
<script src="{{asset('js\jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
@endsection