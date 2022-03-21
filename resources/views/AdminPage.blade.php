@extends('layouts.app')

@section('content')


    <div class="container" dir="rtl">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-warning">
                        <li class="breadcrumb-item active " aria-current="page">طلبات الزبائن</li>
                    </ol>
                </nav>

                <div class="card ">
                    <div class="card-header">
                        <a style="float:right;" href="{{ route ('cat.show') }}"><button class="bnt btn-success btn-default"
                                style="margin-left:6px ;">إضافة صنف جديد </button></a>

                        <a style="float:right;" href="{{ route ('meal.create') }}"><button class="bnt btn-danger btn-default"
                                style="margin-left:6px ;">إضافة وجبة </button></a>

                        <a style="float:right;" href=""><button class="bnt btn-info btn-default"
                                style="margin-left:6px ;">عرض الوجبات</button></a>

                    </div>
                    
                    <div class="card-body text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الايميل</th>
                                    <th scope="col">الهاتف</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">الوقت</th>
                                    <th scope="col">اسم الوجبة</th>
                                    <th scope="col">العدد</th>
                                    <th scope="col">سعر الوجبة($)</th>
                                    <th scope="col">المجموع ($)</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">الحالة </th>
                                    <th scope="col">القبول</th>
                                    <th scope="col">رفض الطلب</th>
                                    <th scope="col">إتمام الطلب</th>
                                </tr>
                            </thead>
                            <tbody>


                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                        <td>13</td>
                                        <td>14</td>

                                    </tr>
                                


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
