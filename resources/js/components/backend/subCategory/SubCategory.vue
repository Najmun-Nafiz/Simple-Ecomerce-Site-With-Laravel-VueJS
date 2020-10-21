<template>
    <div class="container">
        <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>SubCategory</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">SubCategory</li>
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
	                <h3 class="card-title text-light font-weight-bold">Total SubCategories </h3>

	                <button type="button" class="btn btn-secondary float-right" data-toggle="modal" @click="addSubCategory">Add-New <i class="nav-icon fas fa-plus ml-2"></i></button>
	              </div>
	              <div class="datatable-header pl-4 pr-4">  
	                <strong class="float-left font-weight-bold">Search By : </strong>
	                <div class="datatable-select ml-4">
	                  <select v-model="queryField" class="form-control" id="field">
	                    <option value="id">Id</option>
	                    <option value="title">Title</option>
	                    <option value="category_id">Category</option>
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
	                <form @submit.prevent="editMode ? update() : createSubCategory()" @keydown="form.onKeydown($event)">
	                  	<div class="modal-body">
		                    <div class="form-group mb-1">
		                        <label>Title</label>
		                        <input v-model="form.title" type="text" name="title"
		                            class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Title">
		                        <has-error :form="form" field="title"></has-error>
		                    </div>
							<div class="form-group mb-1">
								<label>Selecet Category</label>
								<select v-model="form.category_id" id="category_id" name="category_id"
									class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" placeholder="Category_Id">
									<option value="">Select One</option>
									<option v-for="(result, index) in categories" :key="result.id" :value="result.id">{{ result.title }}</option>
								</select>
								<has-error :form="form" field="category_id"></has-error>
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
	                    <th>Status</th>
	                    <th>Actions</th>
	                  </tr>
	                  </thead>
	                  <tbody>

	                  <tr v-for="(result, index) in subCategories" :key="result.id">
	                    <td>{{ result.id }}</td>
	                    <td>{{ result.title }}</td>
	                    <td class="description-width">{{ result.category.title }}</td>
	                    <td>
	                      <span v-if="result.status == true" class="alert-success p-1" style="color: black;">Active</span>
	                                            
	                      <span v-else class="alert-danger p-1" style="color: black;">Un-Active</span>
	                    </td>
	                    <td>
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
        name: 'SubCategory',

        components: {
            Pagination,
        },

        data() {
	      return {
	        editMode: false,
	        subCategories: {},
	        categories: {},
	        query: '',
	        queryField: 'id',
	        pagination:{
	        	current_page: 1
	      	},
	      // Create a new form instance
	      form: new Form({
	          id: '',
	          title: '',
	          category_id: '',
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
	          	axios.get('/api/subCategory?page='+this.pagination.current_page)
	          	.then(response => {
		            this.subCategories=response.data.data;
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

	      	searchData(){
	          	axios.get('/api/search/subCategory/'+this.queryField+'/'+this.query+'?page='+this.pagination.current_page)
	          	.then(response => {
		            this.subCategories=response.data.data;
		            this.pagination=response.data.meta;
	          	})
	          	.catch(e => {
	            	console.log(e)
	          	})
	      	},

	      	addSubCategory() {
	      		this.editMode = false;
	          	$('#addItem').modal('show');
	          	$('#addModalLabel').text('Add Sub-Category..');
	          	$('#buttonText').text('Insert-Data');
	          	this.form.reset();
	          	this.form.clear();
	      	},

	      	createSubCategory() {
	          	this.form.busy = true;
	          	this.form.post('/api/subCategory')

	          	.then(response => {
	            	this.getData();
	            	if(this.form.successful){
	              		$('#addItem').modal('hide');
	                	toastr.success('Successfully added Sub-Category.', 'Success')
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
	          	$('#addModalLabel').text('Update Sub-Category..');
	          	$('#buttonText').text('Update-Data');
	      	},

	      	update(){
	          	this.form.busy = true;
	          	this.form.put('/api/subCategory/'+this.form.id)
	          	.then(response => {
	            	this.getData()
	            	if(this.form.successful){
	              		$('#addItem').modal('hide');
	              		toastr.success('Sub-Category Updated Successfully.', 'Success')
	            	}
	          	})
	          	.catch(e => {
	            	toastr.error('Something is missing...!', 'Prepare to die!')
	          	})
	      	},

	      	active(id) {
	          	axios.get('/api/subCategory/active/'+id)

	          	.then(response => {
	            	this.getData();
	            	toastr.success('Successfully Sub-Category activated.', 'Success')
	          	})

	          	.catch(e => {
	            	toastr.error('Something is wrong...!', 'Prepare to die!')
	          	})
	      	},

	      	unactive(id) {
	          	axios.get('/api/subCategory/unactive/'+id)

	          	.then(response => {
	              	this.getData();
	             	toastr.error('Successfully Sub-Category un-activated.', 'Error.')
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
	          	$('#deleteModalLabel').text('Delete Sub-Category Info..');
	      	},

	      	destoryInfo() {
          		this.form.delete('/api/subCategory/'+this.form.id)
          		.then(response => {
            	this.getData();
            	$('#deleteModal').modal('hide');
            	if(this.form.successful){
              		toastr.success('Successfully Sub-Category deleted.', 'Success')
            	}
          	})
          	.catch(e => {
            		toastr.error('Something is wrong...!', 'Prepare to die!')
          		})
      		}
	    }
    }
</script>
