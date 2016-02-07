 
        <div class="col s12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">{{ $mop }}</span>
              <p><span>Account Name / Receiver Name: </span>{{ $account_name }}</p>
              @if($account_id)
              <p><span>Account No / Mobile No: </span>
              {{ $account_id }}
              @endif
              </p>
              @if($address)
              <p><span>Address: </span>
              {{ $address }}
              @endif
              </p>


            </div>
            <div class="card-action stripbutton">
              <button class="col s12 btn waves-effect waves-light form-submit" type="submit" name="action" id="checkOutBtn">Place Order</button>
            </div>
          </div>
        </div>
