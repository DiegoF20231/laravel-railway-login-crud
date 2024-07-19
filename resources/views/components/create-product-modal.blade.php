@vite('resources/js/product/validation.js')
<button type="button" class="btn btn-primary mb-3 d-block mx-2 mt-3" data-bs-toggle="modal" data-bs-target="#createModal">
    Nuevo producto
</button>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content rounded-4 " style="min-width: 700px; max-width: 900px;">
            <div class="modal-header bg-primary ">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Nuevo producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="api/product/createProduct" method="POST" id="createProductForm"
                    enctype="multipart/form-data" novalidate>

                    <div class="row">

                        <div class="mb-3 col-6">
                            @csrf
                            <label for="name" class="form-label">Nombre del producto</label>
                            <input required id="name" name="name" class="form-control" type="text"
                                placeholder="Ingrese un nombre de producto">
                            <div class="invalid-feedback">Ingrese un nombre de producto</div>
                        </div>



                        <div class="mb-3 col-6">
                            <label for="price" for="price" class="form-label">Precio del producto</label>
                            <input required id="price" name="price" class="form-control" min="0"
                                type="number" placeholder="Ingrese un precio de producto">
                            <div class="invalid-feedback">Ingrese un precio de producto</div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="mb-3 col-12">
                            <label for="description" class="form-label">Descripcion del producto</label>
                            <textarea required id="description" cols="55" rows="10" class="form-control" name="description"
                                placeholder="Ingrese una descripcion del producto"></textarea>
                            <div class="invalid-feedback">Ingrese una descripcion de producto</div>
                        </div>




                    </div>
                    <div>
                        <label for="file" class="form-label col-6">Imagen del producto</label>
                        <input name="file" id="file" class="form-control" type="file"
                            placeholder="Suba un archivo" required>
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
