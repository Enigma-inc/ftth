   <form class="form-horizontal" role="form" @submit.prevent="placeApplication()">
                        {{ csrf_field() }}
                        <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('name')}">
                                <label for="name" class=" control-label">Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input data-vv-scope="scope"  id="name" type="text" name="name" class="form-control" v-model="application.name" v-validate="{ rules: { required: true} }" >
                                    <span class="help-block" v-show="errors.has('name')">
                                        <strong>@{{ errors.first('name') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('surname')}">
                                <label for="surname" class=" control-label">Surname<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="surname" type="text" class="form-control" name="surname" v-model="application.surname" v-validate="{ rules: { required: true} }" > 
                                     <span class="help-block" v-show="errors.has('surname')">
                                        <strong>@{{ errors.first('surname') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('phoneMobile')}">
                                <label for="phone-mobile" class=" control-label">Cellphone<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="phone-mobile" type="text" class="form-control" v-model="application.phoneMobile" name="phoneMobile" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('phoneMobile')">
                                        <strong>@{{ errors.first('phoneMobile') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10 margin-top-40" :class="{ error: errors.has('passport')}">
                                <label for="passport" class=" control-label">Pasport/ID Number<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="passport" type="text" class="form-control" v-model="application.passport" name="passport" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('passport')">
                                        <strong>@{{ errors.first('passport') }}</strong>
                                    </span>
                                </div>
                            </div>
                               <div class="form-group label-floating padding-right-10">
                             <label for="postal-address" class=" control-label">Postal Address</label>
                               <textarea id="postal-address" class="form-control"  rows="5"></textarea>
                          </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('email')}">
                            
                                <label for="email" class="control-label">Email<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="email" type="text" class="form-control" name="email" v-model="application.email" v-validate="'required|email'"> 
                                     <span class="help-block" v-show="errors.has('email')">
                                        <strong>@{{ errors.first('email') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 ">
                                <label for="phone-home" class=" control-label">Home Phone</label>
                                <div class="">
                                    <input id="phone-home" type="text" class="form-control" v-model="application.phoneHome" name="phone-home" value="{{old('phone-home')}}">
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10">
                                <label for="phone-office" class=" control-label">Office Phone</label>
                                <div class="">
                                    <input id="phone-office" type="text" class="form-control" v-model="application.phoneOffice" name="phone-office" value="{{old('phone-office')}}">
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('existing-customer')}">
                               <p>Are you an existing customer </p>
                                    <label class="radio-inline">
                                    <input v-validate="'required'" type="radio" name="existing-customer">Yes
                                    </label>
                                    <label class="radio-inline">
                                    <input v-validate="'required'" type="radio" name="existing-customer">No
                                    </label>
                                    <p>
                                    <span class="help-block" v-show="errors.has('existing-customer')">
                                        <strong>Please Choose One!</strong>
                                    </span>
                                    </p>
                          </div>
                            <div class="form-group label-floating padding-right-10">
                             <label for="postal-address" class=" control-label">Postal Address</label>
                               <textarea id="postal-address" class="form-control"  rows="5"></textarea>
                          </div>


                        </div>
                        <div class="col-xs-12 text-center">

                            <div class="form-group label-floating padding-right-10">
                                <hr>
                                <button type="submit" class="btn btn-primary">Place Your Request</button>

                            </div>
                        </div>

                    </form>