

<div class="table-responsive-lg p-5 ">
    <table class="table table-borderless border d-sm-none d-lg-table collapse">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            
            </tr>
        </thead>
        </thead>
        @foreach ($users as $user)
            <?php $count = 0; ?>
            <tbody id="toko{{ $user->id }}">
                @php
                    $invoice = [];
                @endphp
                @foreach ($carts as $cart)

                    @if ($cart->product->user_id == $user->id)
                        @php
                            $total += $cart->total;
                            $buy = [
                                'mitra_id' => $cart->product->user_id,
                                'title' => $cart->product->title,
                                'jumlah' => $cart->jumlah,
                                'lokasi'=>$cart->product->lokasi,
                                'subtotal' => $cart->total,
                            ];
                            array_push($invoice, $buy);
                        @endphp
                        <tr>
                            <td>
                                <?php
                            $decode = json_decode($cart->product->foto, true);
                            for ($i=0; $i < 1 ; $i++) { 

                            ?>
                                <img src="{{ asset('product/' . $decode[0]) }}"
                                    class="img-fluid img-thumbnail text-center border rounded" alt=".."
                                    style="height: 40px;width:50px;object-position: center;overflow: hidden;object-fit: cover;">
                                <?php } ?>

                            </td>
                         
                            <td>{{ Str::limit($cart->product->title, 50) }}</td>
                            
                            <td>Rp <span id="harga{{ $cart->id }}">{{ $cart->product->harga }}</span></td>
                            {{-- <input id="harga{{ $cart->id }}" type="text" value="{{$cart->product->harga }}"> --}}
                            <td><span id="harga{{ $cart->id }}">{{ $cart->jumlah}}</span></td>
                            {{-- <!-- <td>
                                <div class="number-input border-0">
                                    <button
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown() ,cartUpdate({{ $cart->id }})"
                                        class="minus text-white bg-success"
                                        style="border-top-left-radius: 50%;border-bottom-left-radius: 50%;"></button>
                                    <input id="jumlah{{ $cart->id }}" class="quantity border-0 text-center"
                                        min="1" max="{{ $cart->product->stok }}" name="quantity"
                                        value="{{ $cart->jumlah }}" type="number" disabled style="width: 50px">
                                    <button
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp() ,cartUpdate({{ $cart->id }})"
                                        class="plus text-white bg-success"
                                        style="border-top-right-radius: 50%; border-bottom-right-radius: 50%;"></button>
                                </div>
                            </td> --> --}}
                            {{-- {{$cart->product->lokasi}} --}}
                            <td id="subtotal{{ $cart->id }}" class="subtotal">{{ $cart->total }}</td>
                        </tr>
                    @endif

                @endforeach
                <tr class=" text-right">

                    <!-- <th scope="col"><img src="{{ asset('assets/avatar/' . $user->avatar) }}"
                            class="img-thumbnail float-left" width="40" alt=""><span
                            class="fw-bold float-left m-2 text-capitalize">{{ $user->name }}</span></th> -->
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                    <!-- <th scope="col">
                        @auth
                            <span class="h5 fw-bold text-black-50">Total</span>

                            <span class="h5 ml-2 fw-bold text-success">Rp {{ $total }}</span>
                            <a href="https://wa.me/{{ $user->no_telp }}?text= *Checkout!*%0A Hallo kak saya {{ Auth::user()->name }} {{ Auth::user()->name }}, %0A _Produk yg saya pesan_ %0A  %0A @foreach ($invoice as $buys) {{ $i++ }}. {{ $buys['title'] }}  %0A     jumlah x {{ $buys['jumlah'] }} = *Rp {{ $buys['subtotal'] }}* %0A @endforeach %0A *Total = Rp {{ $total }}*"
                                target="_blank" class="btn btn-success rounded-6 text-capitalize ml-4">Checkout</a>
                        @endauth

                    </th>  -->
                </tr>

            </tbody>


            @foreach ($title as $prod)
                @if ($prod['mitra_id'] == $user->id)
                    <?php $count = count($title); ?>
                    @php
                        $total = 0;
                    @endphp
                @endif

            @endforeach


            {{-- NULL --}}
            @if ($count == 0)
                <style>
                    #toko{{ $user->id }} {
                        display: none;
                    }

                </style>
            @endif
            {{-- NULL --}}
        @endforeach
    </table>



<div class="card-body">





    
    <label for="provinsi" class="col-md-12 col-form-label text-md-left">Slilahkan Pilih Provinsi Anda</label>
    <select name="provinsi" wire:model="provinsi_id" class="form-control">
        <option value="0">Pilih Provinsi</option>
        @forelse ($daftarProvinsi as $p)
    <option value="{{$p['province_id']}}">{{$p['province']}}</option>        
        @empty
        <option value="0">TIdak ada </option> 
        @endforelse
    </select>
    
    
    <label for="kota" class="col-md-12 col-form-label text-md-left">Slilahkan Pilih Kota Anda</label>
    <select name="kota" wire:model="kota_id" class="form-control">
        <option value="0">Pilih Kota</option>
    
        @if($provinsi_id)
            @forelse ($daftarkota as $k)
            <option value="{{$k['city_id']}}">{{$k['city_name']}}</option>        
             @empty
             <option value="0">TIdak ada </option> 
             @endforelse
        @endif
    </select>
 
<label for="jasa" class="col-md-12 col-form-label text-md-left">Slilahkan Pilih Kurir</label>
    <select name="jasa" wire:model="nama_jasa" class="form-control">
        <option value="0">Pilih Kurier</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">Pilih Kurier</option>
     </select>

     <label for="pengiriman" class="col-md-12 col-form-label text-md-left">Slilahkan Pilih Kurir</label>
     <select name="pengiriman" class="form-control">
         <option value="0">Pilih jasa</option>
         @if($nama_jasa)
         @forelse ($cost[0]['costs'] as $row) 
         <option value="">{{$row['description']}}<br>{{$row['cost'][0]['value']}}{{$row['cost'][0]['etd']}}</option>        
           @empty

          <option value="0">TIdak ada </option> 
          @endforelse
     @endif

      </select>
      <label for="pengiriman" class="col-md-12 col-form-label text-md-left">Masukan Alamat </label>
      <input name="pengiriman" wire:model="asd" class="form-control">



      {{-- foreach($cost[0]['costs'] as $row){
        //         $this->result[]= array (
        //             'description' =>$row['description'],
        //             'biaya' =>$row['cost'][0]['value'],
        //             'etd' =>$row['cost'][0]['etd'], --}}



     <br></br>
     <div class="col-md-6">
        <button type="submit" class="btn -btn-success btn-block">lihat ongkir</button>
     </div>











