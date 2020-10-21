<template>
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Product</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Product</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">

                <div class="card datatable-background">
                  <div class="card-header">
                    <h3 class="card-title text-light font-weight-bold">Total Products </h3>

                    <button type="button" class="btn btn-secondary float-right" data-toggle="modal" @click="addProduct">Add-New <i class="nav-icon fas fa-plus ml-2"></i></button>
                  </div>
                  <div class="datatable-header pl-4 pr-4">  
                    <strong class="float-left font-weight-bold">Search By : </strong>
                    <div class="datatable-select ml-4">
                      <select v-model="queryField" class="form-control" id="field">
                        <option value="id">Id</option>
                        <option value="title">Title</option>
                        <option value="storage">Storage</option>
                        <option value="status">Status</option>
                      </select>
                    </div>
                    <div class="datatable-search">
                      <input v-model="query" type="text" class="form-control" placeholder="Search">
                    </div>  
                  </div>
                  <!-- /.card-header -->

                <!-- /.Edit-Created-Modal -->
                <div class="modal" id="addItem">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content bg-primary">
                    <div class="modal-header modal-modify">
                      <h4 class="modal-title" id="addModalLabel">Large Modal</h4>
                      <button type="button" class="close border-0 mr-2 m-0 rounded-circle p-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <!-- form start -->
                    <form @submit.prevent="editMode ? update() : createProduct()" @keydown="form.onKeydown($event)">
                      <div class="modal-body">

                        <div class="form-group mb-1">
                            <label>Title</label>
                            <input v-model="form.title" type="text" name="title"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Title">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Storage</label>
                            <input v-model="form.storage" type="text" name="storage"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('storage') }" placeholder="Storage">
                            <has-error :form="form" field="storage"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Price</label>
                            <input v-model="form.price" type="text" name="price"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('price') }" placeholder="Price">
                            <has-error :form="form" field="price"></has-error>
                        </div>
                        <div class="form-group mb-1">
            							<label>Selecet Category</label>
            							<select  v-model="form.category_id" id="category_id" name="category_id"
            								class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" placeholder="Category_Id" @change="selectedId(form.category_id)">
            								<option value=""> {{ selectTitle }} </option>
            								<option v-for="(result, index) in categories" :key="result.id" :value="result.id">
                            {{ result.title }}
                          </option>
            							</select>
            							<has-error :form="form" field="category_id"></has-error>
            						</div>
                        <div class="form-group mb-1">
                          <label>Selecet Sub Category</label>
                          <select v-model="form.sub_category_id" id="sub_category_id" name="sub_category_id"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('sub_category_id') }" placeholder="Sub-Category_Id">
                            <option value=""> {{ selectTitle }} </option>
                            <option v-for="(result, index) in subCategories" :key="result.id" :value="result.id" >{{ result.title }}</option>
                          </select>

                          <has-error :form="form" field="sub_category_id"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Description</label>
                            <textarea v-model="form.description" type="text" name="description"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Description"></textarea>
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Slect Image</label>
                            <input type="file" class="form-control" id="image1" name="image1" @change="onChange" :class="{ 'is-invalid': form.errors.has('image1') }" placeholder="Photo">
                            <has-error :form="form" field="image1"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Slect Image-2</label>
                            <input type="file" class="form-control" id="image2" name="image2" @change="onChange2" :class="{ 'is-invalid': form.errors.has('image2') }" placeholder="Photo-2">
                            <has-error :form="form" field="image2"></has-error>
                        </div>
                        <div class="form-group mb-1">
                            <label>Slect Image-3</label>
                            <input type="file" class="form-control" id="image3" name="image3" @change="onChange3" :class="{ 'is-invalid': form.errors.has('image3') }" placeholder="Photo-3">
                            <has-error :form="form" field="image3"></has-error>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success" id="buttonText" :disabled="form.busy">Save changes</button>
                      </div>
                  </form>  
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <!-- /.Destroy-Modal -->
              <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title" id="deleteModalLabel">Danger Modal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form @submit.prevent="destoryInfo" @keydown="form.onKeydown($event)">
                      <div class="modal-body destroy-body">
                        <h5 class="card-title">Are you sure ?</h5>
                      </div>
                      <div class="modal-footer justify-content-between border-0">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button :disabled="form.busy" type="submit" class="btn btn-primary">Yes</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>


              <div class="card-body"> 
                  <table class="table table-secondary table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Price</th>
                        <th>Image-1</th>
                        <th>Image-2</th>
                        <th>Image-3</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>

                      <tr v-for="(result, index) in products" :key="result.id">
                        <td>{{ result.id }}</td>
                        <td>{{ result.title }}</td>
                        <td>{{ result.category.title }}</td>
                        <td v-if="result.sub_category_id === null">Null</td>
                        <td v-else>{{ result.sub_category.title }}</td>
                        <td>{{ result.price }}</td>
                        <td>
                            <img :src="'/uploads/product/'+result.image1" alt="No image" style="height: 60px; width: 60px;border-radius:50%;">
                        </td>
                        <td>
                            <img :src="'/uploads/product/'+result.image2" alt="No image" style="height: 60px; width: 60px;border-radius:50%;">
                        </td>
                        <td>
                            <img :src="'/uploads/product/'+result.image3" alt="No image" style="height: 60px; width: 60px;border-radius:50%;">
                        </td>
                        <td style="width:15%;">
                          <span v-if="result.status == true" class="alert-success p-1" style="color: black;">Active</span>
                                                
                          <span v-else class="alert-danger p-1" style="color: black;">Un-Active</span>
                        </td>
                        <td  style="width:20%;">
                          <a v-if="result.status == true" href="#"><button @click="unactive(result.id)" type="button" class="btn btn-secondary"><i class="fas fa-times-circle"></i></button></a>

                          <a v-else href="#"><button @click="active(result.id)" type="button" class="btn btn-success"><i class="fas fa-check-circle"></i></button></a>

                          <a href="#"><button @click="edit(result)" type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>

                          <a href="#"><button @click="destroy(result)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                        </td>
                      </tr>
                      
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Price</th>
                        <th>Image-1</th>
                        <th>Image-2</th>
                        <th>Image-3</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <Pagination 
                    :pagination="pagination"
                    :offset="5"
                    @paginate="query === '' ? getData() : searchData()"
                    />
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>
<script>
    import Pagination from '../partial/Pagination';
    export default {
        name: 'Product',

        components: {
            Pagination,
        },

        data() {
            return {
                selectTitle: 'Select One',
                editMode: false,
                products: {},
                categories: {},
                subCategories: {},
                query: '',
                queryField: 'id',
                pagination:{
                	current_page: 1
            	},
            	// Create a new form instance
            	form: new Form({
                    id: '',
                    category_id: '',
                    sub_category_id: '',
                    title: '',
                    storage: '',
                    price: '',
                    description: '',
                    image1: '',
                    image2: '',
                    image3: '',
                    status: ''
                })
            }
        },

        created() {
            this.getData();  
            this.dataCategory(); 
        },

        watch: {
            query:function(newQ, old){
            if(newQ === ''){
              this.getData();
            }
            else{
              this.searchData()
            }
          }
        },

        methods: {
            getData() {
                axios.get('/api/product?page='+this.pagination.current_page)
                .then(response => {
                    this.products=response.data.data;
                    this.pagination=response.data;
                })
                .catch(e => {
                    console.log('error..');
                })
            },

            dataCategory() {
	          	axios.get('/api/catename/category')
	          	.then(response => {
		            this.categories=response.data.data;
	          	})
	          	.catch(e => {
	            	console.log('error..');
	          	})
	      	  },

            selectedId(category_id) {
              axios.get('/api/subCatename/subCategory/'+category_id)
                .then(response => {
                  console.log(response)
                  this.subCategories=response.data;
                })
                .catch(e => {
                  console.log('error..');
                })
            },

            searchData(){
              axios.get('/api/search/product/'+this.queryField+'/'+this.query+'?page='+this.pagination.current_page)
                .then(response => {
                    this.products=response.data.data;
                    this.pagination=response.data.meta;
                })
                .catch(e => {
                    console.log(e)
                })
            },

            addProduct() {
                $('#addItem').modal('show');
                $('#addModalLabel').text('Add Product..');
                $('#buttonText').text('Insert-Data');
                this.form.reset();
                this.form.clear();
            },

            onChange(e){
                let image1 = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image1);
                reader.onload = (e) => {
                    this.form.image1 = e.target.result
                }
            },

            onChange2(e){
                let image2 = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image2);
                reader.onload = (e) => {
                    this.form.image2 = e.target.result
                }
            },

            onChange3(e){
                let image3 = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(image3);
                reader.onload = (e) => {
                    this.form.image3 = e.target.result
                }
            },

            createProduct() {
                this.form.busy = true;
                this.form.post('/api/product')

                .then(response => {
                    this.getData();
                    if(this.form.successful){
                        $('#addItem').modal('hide');
                        toastr.success('Successfully added product.', 'Success')
                    }
                })

                .catch(e => {
                    toastr.error('Something is missing...!', 'Prepare to die!')
                })
            },

            edit(result) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(result)
                $('#addItem').modal('show');
                $('#addModalLabel').text('Update Product..');
                $('#buttonText').text('Update-Data');
            },

            update(){
                this.form.busy = true;
                this.form.put('/api/product/'+this.form.id)
                .then(response => {
                    this.getData()
                    if(this.form.successful){
                    $('#addItem').modal('hide');
                        toastr.success('Product Updated Successfully.', 'Success')
                    }
                })
                .catch(e => {
                    toastr.error('Something is missing...!', 'Prepare to die!')
                })
            },

            active(id) {
                axios.get('/api/product/active/'+id)

                .then(response => {
                this.getData();
                    toastr.success('Successfully product activated.', 'Success')
                })

                .catch(e => {
                    toastr.error('Something is wrong...!', 'Prepare to die!')
                })
            },

            unactive(id) {
                axios.get('/api/product/unactive/'+id)

                .then(response => {
                    this.getData();
                    toastr.success('Successfully product un-activated.', 'Success')
                })

                .catch(e => {
                    toastr.error('Something is wrong...!', 'Prepare to die!')
                })
            },

            destroy(result) {
                this.form.reset();
                this.form.clear();
                this.form.fill(result);
                $('#deleteModal').modal('show');
                $('#deleteModalLabel').text('Delete Product Info..');
            },

            destoryInfo() {
                this.form.delete('/api/product/'+this.form.id)
                .then(response => {
                this.getData();
                $('#deleteModal').modal('hide');
                if(this.form.successful){
                        toastr.success('Successfully product deleted.', 'Success')
                    }
                })
                .catch(e => {
                    toastr.error('Something is wrong...!', 'Prepare to die!')
                })
            }
        }
    }
</script>
