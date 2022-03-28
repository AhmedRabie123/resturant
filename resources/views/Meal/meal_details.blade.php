@extends('layouts.app')

@section('content')


<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
               <div class="card-header bg-success text-center text-light"> الوجبه </div>
                 
                <div class="card-body text-right">
                    <div class="row">

                        <div class="col-md-6">
                            <p>
                                <h3><strong style="color: seagreen ; font-size: 22px">نوع الوجبه :</strong>{{$meal->category}}</h3>
                            </p>

                            <p>
                                <h3><strong style="color: seagreen ; font-size: 22px">اسم الوجبه :</strong>{{$meal->name}}</h3>
                            </p>

                            <p>
                                <h3><strong style="color: seagreen ; font-size: 22px">سعر الوجبه :</strong>{{$meal->price}}$</h3>
                            </p>

                            <p>
                                <h3><strong style="color: seagreen ; font-size: 22px">مكونات الوجبه :</strong>{{$meal->description}}</h3>
                            </p>
                        </div>
                    <div class="col-md-6">
                        <img src="{{ asset($meal->image) }}" class="img-thumbnail" style="width: 500px">
                    </div>

                    </div>
                </div>
               
           </div>
        </div>
  
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-center"> معلومات الطلب</div>

                <div class="card-body text-light">
                    @if(Auth::check())
                        <form action="{{ route('order.store') }}" method="post">
                          @csrf

                          <div class="form-group">
                             <p style="color: black;"><strong style="color: seagreen ; font-size: 18px">الاسم : </strong>{{Auth()->user()->name}}</p>
                             <p style="color: black;"><strong style="color: seagreen ; font-size: 18px">الايميل : </strong>{{Auth()->user()->email}}</p>
                             <p><strong style="color: seagreen ; font-size: 18px">رقم الهاتف : </strong><input type="number" name="phone" class="form-control" required></p>
                             <p><strong style="color: seagreen ; font-size: 18px">العدد : </strong><input type="number" name="qty" class="form-control" value="0"></p>

                             <p><input type="hidden" name="meal_id" value="{{$meal->id}}"></p>
                             <p><strong style="color: seagreen; font-size: 18px">التاريخ : </strong><input type="date" name="date" class="form-control" required></p>
                             <p><strong style="color: seagreen; font-size: 18px">الوقت : </strong><input type="time" name="time" class="form-control" required></p>
                             <p><strong style="color: seagreen; font-size: 18px">العنوان : </strong> :<textarea class="form-control" name="address" required></textarea></p>
                             
                             <p class="text-center">
                                <button class="btn btn-success" type="submit" style="font-size: 20px">أطلب الان</button>
                             </p>

                          </div>
                          
                        </form>
                    @else
                      <p><a href="/login">من فضلك قم بتسجيل الدخول</a></p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<style>
 
 .card-header {
     color: #fff;
     font-size: 22px;
 }

</style>

@endsection