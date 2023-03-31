<div class="modal fade" id="client-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- {{ Form::open(['id' => 'myForm']) }}
            {{ Form::hidden('id', null, ['id' => 'myId']) }} --}}
            <form method="POST" id="edit-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="modal-body row g-3">
                    <div class="col-md-12 ">
                        <label for="avatar" class="form-label">Upload Image </label>
                        <input name="image" class="form-control" type="file" id="avatar" accept=".jpg,.png">
                    </div>
                    <div class="col-md-6 ">
                        <label for="client-name" class="form-label">Name</label>
                        <input name="name" class="form-control" id="client-name" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="client-email" class="form-label">Email</label>
                        <input name="email" class="form-control" id="client-email" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="client-id" class="form-label">Natioanl ID</label>
                        <input name="id" class="form-control" id="client-id" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="client-gender" class="form-label">Gender</label>
                        <select name="gender" id="client-gender" class="form-select "
                            aria-label="Default select example">
                            <option selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6 ">
                        <label for="client-phone" class="form-label">Phone Number</label>
                        <input name="phone" class="form-control" id="client-phone" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="postal" class="form-label">Postal Code</label>
                        <input name="area_id" class="form-control" id="postal" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="street" class="form-label">Street Name</label>
                        <input name="street_name" class="form-control" id="street" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="building" class="form-label">Building Number</label>
                        <input name="building_no" class="form-control" id="building" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="floor" class="form-label">Floor Number</label>
                        <input name="floor_number" class="form-control" id="floor" value="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="flat" class="form-label">Flat Number</label>
                        <input name="flat_number" class="form-control" id="flat" value="">
                    </div>
                    <div class="col-md-6  ms-4">
                        <input class="form-check-input" name="is_main" type="checkbox" id="main"
                            value="">
                        <label class="form-check-label" for="gridCheck">
                            Main Street
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary text-white">Edit</button>
                </div>
                {{-- {{ Form::close() }}
            {{ Form::close() }} --}}
            </form>

        </div>
    </div>
</div>


<script>
    function clienteditmodalShow(event) {
        var itemId = event.target.id;
        $('input').val("")
        $.ajax({
            url: "{{ route('clients.show', ':id') }}".replace(':id', itemId),
            method: "GET",
            success: function(response) {
                console.log(response.client.area_id)
                //$('#image').text(response.client.image)
                $('#client-name').val(response.user.name)
                $('#client-email').val(response.user.email)
                $('#client-id').val(response.client.id)
                $('#client-gender').val(response.client.gender)
                $('#client-phone').val(response.client.phone)
                $('#postal').val(response.client.area_id)
                $('#street').val(response.client.street_name)
                $('#building').val(response.client.building_no)
                $('#floor').val(response.client.floor_number)
                $('#flat').val(response.client.flat_number)
                $('#main').prop('checked', response.client.is_main);
                $('#main').val('checked', response.client.is_main);
            }
        });
        /* document.getElementById('myId').addEventListener('change', function() {
            var route = "{{ route('clients.update', ':id') }}".replace(':id', itemId);
            document.getElementById('edit-form').action = route;
            document.getElementById('myForm').method = "POST"
        }); */

        var route = "{{ route('clients.update', ':id') }}".replace(':id', itemId);
        document.getElementById('edit-form').action = route;

    }
</script>
