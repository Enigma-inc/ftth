<div class="contracts-page">
    <div class="row text-left margin-left-10">
        <h4>24 Months Contract packages
            <br><span class="margin-left-5  ">– FREE MODEM & INSTALLATION</span>
        </h4>
        <hr>
    </div>

 <div class="row">

     <div class="col-xs-12 col-md-12 contract-container">
         <div class="contract-header">
             <div class="contract">Price</div>
             <div class="contract">Data Volume</div>
             <div class="contract"></div>
         </div>
         @foreach ($packages->filter(function($item)
         {
             return $item->type == 'contract';
         }) as $package)
             
         <div class="contract-details">
        <div class="contract"><span>M</span>{{number_format ( $package->price,2 ) }}</div>
             <div class="contract">{{$package->data_bundle}} <span>GB</span></div>
             <div class="contract"> 
                 <apply-btn :package-type="'contract'" :package="{{$package->id}}"></apply-btn>    
            </div>
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