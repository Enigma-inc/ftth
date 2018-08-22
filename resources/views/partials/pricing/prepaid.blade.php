<div class="contracts-page">
    <div class="row text-left margin-left-10">
        <ul class="margin-top-50" style="font-size: 1.3em;font-weight:400">
            <li>Prices include Equipment fee of M999</li>
            <li>Once off Connection Fee M500 has to be paid before installation</li>
        </ul>
        <hr>
    </div>

 <div class="row">
     <div class="col-xs-12 col-md-12">
         <h4 class="text-left margin-left-10  contract-title"></h4>
         <div class="contract-header margin-top-40">
             <div class="contract">Once off Price (Modem + data) </div>
             <div class="contract">Data Volume</div>
             <div class="contract"></div>
         </div>
          @foreach ($packages->filter(function($item)
         {
             return $item->type == 'prepaid';
         }) as $package)
             
         <div class="contract-details">
             <div class="contract"><span>M</span> {{$package->price}}</div>
             <div class="contract">{{$package->data_bundle}} <span>GB</span></div>
             <apply-btn :package="{{$package->id}}"></apply-btn>    
         </div>
         @endforeach

     </div>
 </div>

    <div class="row info ">
        <div class="margin-top-50 ">
            <p >Dial <span>*100#</span> for more pricing on low end daily, weekly and monthly bundles</p>
            <h2 class=" title  margin-top-20 margin-bottom-10">Promotions</h2>
            <p>Click <a target="_blank" href="http://www.etl.co.ls/index.php?option=com_content&view=article&id=76:promotions&catid=10:deals&Itemid=105">here</a> to view current promotions</p>
        </div>

    </div>
</div>