    <form class="form-horizontal" role="form" @submit.prevent="submitPersonalDetails('form-personal')" data-vv-scope="form-personal">                    
                         <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-personal.name')}">
                                <label for="name" class=" control-label">Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input data-vv-scope="scope"  id="name" type="text" name="name" class="form-control" v-model="personalDetails.name" v-validate="{ rules: { required: true} }" >
                                    <span class="help-block" v-show="errors.has('form-personal.name')">
                                        <strong>@{{ errors.first('form-personal.name') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-personal.surname')}">
                                <label for="surname" class=" control-label">Surname<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="surname" type="text" class="form-control" name="surname" v-model="personalDetails.surname" v-validate="{ rules: { required: true} }" > 
                                     <span class="help-block" v-show="errors.has('form-personal.surname')">
                                        <strong>@{{ errors.first('form-personal.surname') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-personal.phoneMobile')}">
                                <label for="phone-mobile" class=" control-label">Cellphone<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="phone-mobile" type="text" class="form-control" v-model="personalDetails.phoneMobile" name="phoneMobile" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('form-personal.phoneMobile')">
                                        <strong>@{{ errors.first('form-personal.phoneMobile') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10 " :class="{ error: errors.has('form-personal.passport')}">
                                <label for="passport" class=" control-label">Pasport/ID Number<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="passport" type="text" class="form-control" v-model="personalDetails.passport" name="passport" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('form-personal.passport')">
                                        <strong>@{{ errors.first('form-personal.passport') }}</strong>
                                    </span>
                                </div>
                            </div>
                       
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('form-personal.email')}">
                            
                                <label for="email" class="control-label">Email<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="email" type="text" class="form-control" name="email" v-model="personalDetails.email" v-validate="'required|email'"> 
                                     <span class="help-block" v-show="errors.has('form-personal.email')">
                                        <strong>@{{ errors.first('form-personal.email') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 " >
                                <label for="phone-home" class=" control-label">Home Phone</label>
                                <div class="">
                                    <input id="phone-home" type="text" class="form-control" v-model="personalDetails.phoneHome" name="phone-home" value="{{old('phone-home')}}">
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10">
                                <label for="phone-office" class=" control-label">Office Phone</label>
                                <div class="">
                                    <input id="phone-office" type="text" class="form-control" v-model="personalDetails.phoneOffice" name="phone-office" value="{{old('phone-office')}}">
                                </div>
                            </div>
                               <div class="col-xs-12 col-md-12">

                            <div class="form-group label-floating padding-right-10 " :class="{ error: errors.has('form-personal.location')}">
                                <label for="location" class="control-label ">Select Your Location<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="location" id="location_id" class="form-control " v-model="personalDetails.location" v-validate="{ rules: { required: true} }">
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}"><strong>{{$location->name}}</strong></option>
                                            @endforeach
                                        </select> 
                                     <span class="help-block" v-show="errors.has('form-personal.location')">
                                        <strong>@{{ errors.first('form-personal.location') }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>                      
                          


                        </div>
                        <div class="col-xs-12">
                        <div class="col-md-6">
                         <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-personal.postalAddress')}">
                             <label for="postal-address" class=" control-label">Postal Address<span class="required-star">*</span></label>
                               <textarea id="postal-address" class="form-control"  rows="5" v-model="personalDetails.postalAddress" >
                               </textarea>
                                     <span class="help-block" v-show="errors.has('form-personal.postalAddress')">
                                        <strong>@{{ errors.first('form-personal.postalAddress') }}</strong>
                                    </span>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group label-floating padding-right-10 " :class="{ error: errors.has('form-personal.physicalAddress')}">
                             <label for="physical-address" class=" control-label">Physical Address<span class="required-star">*</span></label>
                               <textarea id="physical-address" class="form-control"  rows="5" v-model="personalDetails.physicalAddress" >
                               </textarea>
                                     <span class="help-block" v-show="errors.has('form-personal.physicalAddress')">
                                        <strong>@{{ errors.first('form-personal.physicalAddress') }}</strong>
                                    </span>
                          </div>
                        </div>
                          
                        </div>
                        <div class="col-xs-12 text-center">

                            <div class="form-group label-floating padding-right-10">
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
              

        
</form>
              

        