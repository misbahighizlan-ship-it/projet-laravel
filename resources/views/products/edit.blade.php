@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-warning text-dark rounded-top-4 py-3">
                <h3 class="mb-0">
                    <i class="bi bi-pencil-square"></i>
                    Modifier un Produit
                </h3>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('products.update', $product->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Nom du produit
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            value="{{ $product->name }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"
                            required>{{ $product->description }}</textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Prix (DH)
                                </label>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="price"
                                    class="form-control"
                                    value="{{ $product->price }}"
                                    required>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Quantité
                                </label>

                                <input
                                    type="number"
                                    name="quantity"
                                    class="form-control"
                                    value="{{ $product->quantity }}"
                                    required>

                            </div>

                        </div>

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('products.index') }}"
                           class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-arrow-left"></i>
                            Retour
                        </a>

                        <button
                            type="submit"
                            class="btn btn-warning rounded-pill px-5">

                            <i class="bi bi-check-circle"></i>
                            Modifier

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection