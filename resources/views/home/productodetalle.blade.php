@extends('layouts.master')

@section('title')
	{{$producto->titulo}}
@endsection

@section('content')
<section>
		<div class="container">
			<div class="row">
				@include('partials.leftsidebar')

				<div class="col-sm-9 padding-right">
					<div class="product-details">{{--Producto--}}
						<div class="col-sm-5">
							<div class="view-product">{{--Imagen destacada--}}
								@foreach($producto->imagenes->take(1) as $imagen)
									<img src="{{$imagen->rutaimagen}}" alt="" />
									<h3>ZOOM</h3>
								@endforeach
							</div>{{--./Imagen destacada--}}
							<div id="similar-product" class="carousel slide" data-ride="carousel">{{--Carousel Imagenes--}}
								    <div class="carousel-inner">
										@foreach($producto->imagenes->chunk(3) as $imagenchunk)
											<div class="item {{$loop->first ? 'active' : ''}}">
												@foreach($imagenchunk as $imagen)
													<a href=""><img src="{{$imagen->rutaimagen}}" alt="" class="img-responsive" style="height:84px;width:71px"></a>
												@endforeach
											</div>
										@endforeach
									</div>
								  {{--Controles--}}
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>{{--./Carousel Imagenes--}}

						</div>
						<div class="col-sm-7">
							<div class="product-information">{{--Informacion Producto--}}
								@if($producto->condicion)
									@if($producto->condicion == 'Nuevo')
										<h4><span class="label label-success newarrival">{{$producto->condicion}}</span></h4>
									@endif
								@endif

								@if($producto->oferta)
									<h4><span class="label label-info newarrival">En oferta</span></h4>
								@endif

								<h2>{{$producto->titulo}}</h2>
								<p>Web ID: {{$producto->id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
                                    <span>CLP ${{$producto->precio}}</span>
                                    <form action="{{ route('product.postanadiralcarro') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $producto->id }}">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="text" name="cantidad" id="cantidad" value="1">
                                        <button type="submit" class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i> Añadir al carro
                                        </button>
                                    </form>
								</span>
								@if($producto->condicion === 'Sin stock')
									<p><b>Disponibilidad:</b> Sin Stock</p>
								@else
									<p><b>Disponibilidad:</b> En stock</p>
								@endif
								@if($producto->condicion)
									<p><b>Condicion:</b> {{$producto->condicion}}</p>
								@endif
								@foreach($producto->marca as $marca)
									<p><b>Marca:</b> {{$marca->nombre}}</p>
								@endforeach
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div>{{--./Informacion Producto--}}
						</div>
					</div>{{--./Producto--}}

					<div class="category-tab shop-details-tab">{{--Pestañas inferiores--}}
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Detalles</a></li>
								{{--<li class="active"><a href="#reviews" data-toggle="tab">Comentarios (5)</a></li>--}}
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-11">
									<p>{{$producto->descripcion}}</p>
								</div>

							</div>
						</div>
					</div>{{--./Pestañas inferiores--}}

				</div>
			</div>
		</div>
	</section>
@endsection
