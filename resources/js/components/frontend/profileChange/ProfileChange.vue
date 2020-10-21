<template>
    <div class="container-fluid profile-image authenticate">
        <div class="row">
            <div class="col-md-6 p-0">
                <div class="card bg-color">
                    <div class="position-set">
                        <div class="card-header bg-transparent border-0 ">
                            <h1 class="card-title font-weight-bold text-white">
                                Profile Update
                            </h1>
                        </div>
                                

                        
                        <form @submit.prevent="profileUpdate()" @keydown="form.onKeydown($event)">
                            <div class="card-body pt-0">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-white">Enter Name</label>
                                    <div class="col-md-8">
                                        <input v-model="form.name" type="text" name="name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-white">Enter Email</label>
                                    <div class="col-md-8">
                                        <input v-model="form.email" type="email" name="email"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Enter Email">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-white">Enter Phone</label>
                                    <div class="col-md-8">
                                        <input v-model="form.phone" type="number" name="phone"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Enter Phone">
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-white">Enter Address</label>
                                    <div class="col-md-8">
                                        <textarea v-model="form.address" type="text" name="address"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Enter Address"></textarea>
                                        <has-error :form="form" field="address"></has-error>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right text-white">Slect Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" id="inputImage" name="image" @change="onChange" :class="{ 'is-invalid': form.errors.has('image') }" placeholder="Image">
                                        <has-error :form="form" field="image"></has-error>
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary border-0" :disabled="form.busy">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'ProfileChange',

        data(){
            return {
                Id: this.$route.params.id,
                pagol: {},

                // Create a new form instance
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    image: ''
                })
            }
        },

        created(){
            this.getData();
            this.fillData();
        },

        methods: {
            getData() {
              axios.get('/api/profileChange/'+this.Id)
                  .then(response => {
                      this.form.name=response.data.name;
                      this.form.email=response.data.email;
                      this.form.phone=response.data.phone;
                      this.form.address=response.data.address;
                      this.form.image=response.data.image;
                      this.pagol=response.data;
                  })

                  .catch(e => {
                     console.log('error..');
                  })        
            },

            onChange(e){
                let image = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = (e) => {
                    this.form.image = e.target.result
                }
            },

            fillData(result){
                this.form.reset();
                this.form.clear();
                this.form.fill(result);
            },

            profileUpdate() {
                this.form.busy = true;
                this.form.put('/api/profileUpdate/'+this.Id)

                .then(response => {
                    this.getData()
                    toastr.success('Profile Updated Successfully.', 'Success')
                })
                .catch(e => {
                    toastr.error('Something is missing...!', 'Prepare to die!')
                })
            }
        }
    }
</script>
