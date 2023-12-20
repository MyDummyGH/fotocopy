@extends('template');

@section('pageTitle')
    Form Order
@endsection

@section('mainContent')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Order</h5>
            </div>
            <div class="card-body">
                @if ($data['type'] === 'Edit')
                    <form method="post" action="{{ url('updateOrder').'/'.$dataOrder->id }}" id="formSuratTugas">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama Pelanggan</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-user"></i></span>
                                <input type="text" class="form-control alphabet-input" name="name_order"
                                    id="basic-icon-default-fullname" value="{{ $dataOrder->name }}" placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">No Telephone</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="ti ti-phone-call"></i></span>
                                <input type="text" id="basic-icon-default-company" value="{{ $dataOrder->no_tlp }}" name="no_tlp"
                                    class="form-control numeric-input phone" placeholder="0821xxxxx" aria-label="0821xxxxx"
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Product</label>
                                    <div class="input-group input-group-merge">
                                        <select id="select2Product" name="product" class="select2-icons form-select">
                                            @foreach ($product as $v)
                                                <option value="{{ $v['product'] }}" {{ $dataOrder->product == $v['product'] ? 'selected' : '' }} data-icon="ti ti-box">
                                                    {{ $v['product'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Total</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-circle-plus"></i></span>
                                        <input type="number" class="form-control" value="{{ $dataOrder->total }}" name="total" id="total" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Harga</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-zoom-money"></i></span>
                                <input readonly type="number" class="form-control" name="harga" id="harga" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                @else
                    <form method="post" action="{{ url('inputOrder') }}" id="formSuratTugas">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Nama Pelanggan</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-user"></i></span>
                                <input type="text" class="form-control alphabet-input" name="name_order"
                                    id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">No Telephone</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="ti ti-phone-call"></i></span>
                                <input type="text" id="basic-icon-default-company" name="no_tlp"
                                    class="form-control numeric-input phone" placeholder="0821xxxxx" aria-label="0821xxxxx"
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Product</label>
                                    <div class="input-group input-group-merge">
                                        <select id="select2Product" name="product" class="select2-icons form-select">
                                            @foreach ($product as $v)
                                                <option value="{{ $v['product'] }}" data-icon="ti ti-box">
                                                    {{ $v['product'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="basic-icon-default-fullname">Total</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-circle-plus"></i></span>
                                        <input type="number" class="form-control" name="total" id="total" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Harga</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="ti ti-zoom-money"></i></span>
                                <input readonly type="number" class="form-control" name="harga" id="harga" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
