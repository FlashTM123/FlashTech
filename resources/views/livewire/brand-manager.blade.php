<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold ">📦 Quản lý thương hiệu</h2>
        <select name="" id="" class="select w-fit" wire:model.live='limit'>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10">10</option>
        </select>
        <div>

            <label class="input">

                  <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor"
                  >
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                  </g>
                </svg>
                <input type="search" class="grow" placeholder="Search" wire:model.live.debounce.150ms='search' />
                <kbd class="kbd kbd-sm">⌘</kbd>
                <kbd class="kbd kbd-sm">K</kbd>
              </label>
        </div>
        <button onclick="showAddBrandModal()" class="btn btn-outline btn-primary" >
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <div class="my-3">

        <div class="overflow-x-auto">
            <table class="table">
                <thead class=" text-white-700 text-sm uppercase">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3 text-center">Tên thương hiệu</th>
                        <th class="p-3 text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody id="brand-list">
                    @foreach($brands as $brand)
                        <tr class="">
                            <td class="p-3 font-medium ">{{ $brand->id }}</td>
                            <td class="p-3 text-center">{{ $brand->name }}</td>
                            <td class="p-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <button onclick="showEditBrandModal({{ $brand }})" class="btn btn-outline btn-warning"><i class="fa fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-outline btn-error" wire:click='delete({{ $brand->id}})'><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $brands->links('') }}
    </div>
</div>
<script>
    function showAddBrandModal() {
        Swal.fire({
            title: 'Thêm thương hiệu mới',
            html: `
                <input type="text" id="brand-name" class="swal2-input" placeholder="Nhâp tên thương hiệu">
            `,
            showCancelButton: true,
            confirmButtonText: 'Thêm',
            preConfirm: () => {
                const name = document.getElementById('brand-name').value;
                if (!name ) {
                    Swal.showValidationMessage('Please fill all fields');
                }
                return { name };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('{{ route('brand.store') }}', result.value)
                    .then(response => {
                        Swal.fire('Success', 'Brand added successfully', 'success');
                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Something went wrong', 'error');
                    });
            }
        });
    }

    function showEditBrandModal(brand) {
        Swal.fire({
            title: 'Sửa thương hiệu',
            html: `
                <input type="text" id="brand-name" class="swal2-input" value="${brand.name}" placeholder="Nhâp tên thương hiệu">
            `,
            showCancelButton: true,
            confirmButtonText: 'Sửa',
            preConfirm: () => {
                const name = document.getElementById('brand-name').value;

                if (!name ) {
                    Swal.showValidationMessage('Please fill all fields');
                }
                return { name };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                axios.put("{{ route('brand.update', ':id') }}".replace(':id', brand.id), result.value)

                    .then(response => {
                        Swal.fire('Thành công', 'Thương hiệu đã được sửa thành công', 'success');
                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Something went wrong', 'error');
                    });
            }

        });
    }



</script>
