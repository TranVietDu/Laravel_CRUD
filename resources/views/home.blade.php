@extends('user.layouts.masterlayout')

@section('content')
  <div class="banner">
    <div class="banner_text">
      <h1 class="topic">Welcome to ClassiGrids</h1>
      <p class="slogan">Buy and Sell Everything From Used Cars To Moblile Phone And <br> Computers Or Search For
        Oroperty, Job And More.</p>
    </div>
    <div class="banner_search">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 productkey ">
            <form class="example" action="">
              <input type="text" placeholder="Product keyword" name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="col-md-3 col-sm-6 catelogykey">
           <select name="" id="">
            <option selected value="">Categories</option>
             @foreach($categories as $category)
             <option value="">{{$category->category}}</option>
             @endforeach
           </select>
          </div>
          <div class="col-md-3 col-sm-6 locationkey">
            <select name="" id="">
              <option value="">Locations</option>
              <option value="">New York</option>
              <option value="">LonDon</option>
              <option value="">Las Vegas</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-6  search">
            <button class="btn"><i class="fas fa-search"></i> Search</button>
          </div>
        </div>
      </div>
    </div>
    <div class="banner_icon container">
      <div class="row">
        <div class="col-md-2 col-sm-4">
          <i class="fas fa-car icon"></i>
          <div class="vehicon">Vehicle</div>
          <div class="">
            <span class="number">35</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <i class="fas fa-laptop icon"></i>
          <div class="vehicon">Electronics</div>
          <div>
            <span class="number">22</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <i class="far fa-heart icon"></i>
          <div class="vehicon">Matrymory</div>
          <div>
            <span class="number">35</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <i class="fas fa-couch icon"></i>
          <div class="vehicon">Funitures</div>
          <div>
            <span class="number">45</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <i class="fas fa-briefcase icon"></i>
          <div class="vehicon">Jobs</div>
          <div>
            <span class="number">80</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <i class="fas fa-home icon"></i>
          <div class="vehicon">Real Estate</div>
          <div>
            <span class="number">35</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Lastproduct -->
  <div class="lasproduct">
    <div class="container">
      <div class="lasproduct_text">
        <h2 class="lasproduct_text1">Latest Products</h2>
        <p class="lasproduct_text2">There are many variations of passages of Lorem Ipsum available,but the majorrity
          have suffered <br>alteration in some form.</p>
      </div>
      <div class="lastproduct_product">
        <div class="row">
          @foreach($products as $product)
          <div class="col-md-4 col-sm-6">
            <div class="image">
              <a href=""><img height="250px" src="{{asset('product_image/'.$product->product_image)}}" alt=""></a>
              <div class="user">
                <img src="./assets/image/userpro.jpg" alt="">
                <p class="nameus">Ronaldo</p>
              </div>
              <div class="forsale">
                <button class="btn ">For Sale</button>
              </div>
            </div>
            <div class="title">
              <p class="catelo">{{$product->category->category}}</p>
              <h5 class="nametitle">{{$product->product_name}}</h5>
              <p class="update">Last update: {{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans($now)}}</p>
              <div class="iconstar">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                (20)
              </div>
              <div class="timeaddress">
                <div class="row">
                  <div class="col-md-6">
                    <i class="fas fa-map-marker-alt"></i> {{$product->product_address}}
                  </div>
                  <div class="col-md-6">
                    <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($product->created_at)->toFormattedDateString()}}
                  </div>
                </div>
              </div>
              <div class="price">
                <div class="row">
                  <div class="col-md-6">Start From: <span class="proprice">${{$product->product_price}}</span></div>
                  <div class="col-md-6 heart"><i class="far fa-heart"></i></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="whychoose">
    <div class="container">
      <div class="whychoose_text">
        <h2 class="whychoose_text1">Why Choose Us</h2>
        <p class="whychoose_text2">There are many variations of passages of Lorem Ipsum available,but the majorrity have
          suffered <br> alteration in some form.</p>
      </div>
      <div class="whychoose_content">
        <div class="row whychoose_content_xs">
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-save"></i>
              <h5 class="text">Fully Documented</h5>
              <p>Buy anh sell everything from used case to <br> moblie phones and computer or search for <br> property</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-leaf"></i>
              <h5 class="text">Clean & Model Design</h5>
              <p>Buy anh sell everything from used case to <br>moblie phones and computer or search for <br>property</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-cog"></i>
              <h5 class="text">Completely Customi</h5>
              <p>Buy anh sell everything from used case to <br>moblie phones and computer or search for <br>property</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="far fa-thumbs-up"></i>
              <h5 class="text">Userd Friendlynia</h5>
              <p>Buy anh sell everything from used case to <br>moblie phones and computer or search for <br>property</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-book"></i>
              <h5 class="text">Awesome Layout</h5>
              <p>Buy anh sell everything from used case to <br>moblie phones and computer or search for <br>property</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="content">
              <i class="fas fa-laptop"></i>
              <h5 class="text">Fully Responsive</h5>
              <p>Buy anh sell everything from used case to <br>moblie phones and computer or search for <br>property</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="background">
    <div class="background_text">
      <h3>Currently You are using free <br>Life version of ClassiGrids</h3>
      <p>Please,purcharse full version of the template toget all page, <br> features and commercial licence</p>
      <button class="btn ">Purcharse Now</button>
    </div>
  </div>
  <div class="pricingplan container">
    <div class="pricingplan_text">
      <h2 class="text">Pricing Plan</h2>
      <p>There are many variations of passages of Lorem Ipsum available,but the majorrity have
        suffered <br>alteration in some form.</p>
    </div>
    <div class="pricingplan_content">
      <div class="row">
        @foreach($pricing_plans as $pricing_plan)
        <div class="col-md-4">
          <div class="content">
            <h1>${{$pricing_plan->price}}<span class="small">/Month</span></h1>
            <h4 class="pri">{{$pricing_plan->package}}</h4>
            <p>{{$pricing_plan->content_1}}</p>
            <p>{{$pricing_plan->content_2}}</p>
            <p>{{$pricing_plan->content_3}}</p>
            <p>{{$pricing_plan->content_4}}</p>
            <p>{{$pricing_plan->content_5}}</p>
            <p>{{$pricing_plan->content_6}}</p>
            <button class="btn ">Select Plan</button>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="itwork">
    <div class="container">
      <div class="itwork_text">
        <h2 class="text">How It Works</h2>
        <p>There are many variations of passages of Lorem Ipsum available,but the majorrity have
          suffered <br>alteration in some form.</p>
      </div>
      <div class="itwork_content">
        <div class="row">
          @php
          $i=1
          @endphp
          @foreach($it_works as $it_work)
          <div class="col-md-4">
            <div class="content">
              <div class="num"><small class="number">0{{$i++}}</small></div>
              <h5 class="text1">{{$it_work->title}}</h5>
              <p>{{$it_work->content}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
 @endsection
<!-- Welcome to ClassiGrids -->
<!-- Buy and Sell Everything From Used Cars To Moblile Phone And <br> Computers Or Search For Oroperty, Job And More. -->