@vite('resources/js/product/edit.js')
@props(['product'])
<button type="button" class="btn btn-success mt-3 an_button mb-3 d-block" data-bs-toggle="modal"
    data-bs-target="#editModal{{ $product->product_id }}">
    Editar Producto
</button>

<div class="modal fade" id="editModal{{ $product->product_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content rounded-4 " style="min-width: 700px; max-width: 900px;">
            <div class="modal-header bg-primary ">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Editar Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="api/product/editProduct" class="editModalF" method="POST" id="editProductForm"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <input class="d-none" name="id" value="{{ $product->product_id }}">
                        <div class="mb-3 col-6">
                            @csrf
                            <label for="name" class="form-label">Nombre del producto</label>
                            <input required id="name" name="name" class="form-control" type="text"
                                value="{{ $product->name }}" placeholder="Ingrese un nombre de producto">
                            <div class="invalid-feedback">Ingrese un nombre de producto</div>
                        </div>



                        <div class="mb-3 col-6">
                            <label for="price" for="price" class="form-label">Precio del producto</label>
                            <input required id="price" name="price" class="form-control" min="0"
                                value="{{ $product->price }}" type="number"
                                placeholder="Ingrese un precio de producto">
                            <div class="invalid-feedback">Ingrese un precio de producto</div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="mb-3 col-12">
                            <label for="description" class="form-label">Descripcion del producto</label>
                            <textarea required id="description" cols="55" rows="10" class="form-control" name="description"
                                placeholder="Ingrese una descripcion del producto"> {{ $product->description }}</textarea>
                            <div class="invalid-feedback">Ingrese una descripcion de producto</div>
                        </div>




                    </div>
                    <div>
                        <label for="file" class="form-label col-6">Imagen del producto</label>
                        <p>Si usted no ingresa una imagen se asumira que desea mantener la existente</p>
                        <input name="file" id="file" class="form-control" type="file"
                            placeholder="Suba un archivo">
                        <img src="{{ $product->image_url }}" style="max-height: 100px; max-width: 150px;">
                        <div class="invalid-feedback">Ingrese un archivo</div>
                    </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>

@if (session('editMessage'))
    @vite('resources/js/product/editSuccess.js')
@endif
