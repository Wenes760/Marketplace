<p></p>

<!-- TAMBAHKAN FORM ACTION -->
<form action="{{ route('front.cart') }}" method="POST">
  @csrf
  <div class="product_count">
    <label for="qty">Quantity:</label>
    <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
    
    <!-- BUAT INPUTAN HIDDEN YANG BERISI ID PRODUK -->
    <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
    
    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
    class="increase items-count" type="button">
      <i class="lnr lnr-chevron-up"></i>
    </button>
    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
    class="reduced items-count" type="button">
      <i class="lnr lnr-chevron-down"></i>
    </button>
  </div>
  <div class="card_area">
    
    <!-- UBAH JADI BUTTON -->
    <button class="main_btn">Add to Cart</button>
    <!-- UBAH JADI BUTTON -->
    
  </div>
</form>