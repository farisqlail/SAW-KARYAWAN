<div class="modal fade" id="modalHapus" data-id="{{ route('lowongan.delete', ['id', $lowongan[0]->id_lowongan]) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Lowongan
                </h5>
                <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/img/delete-alert.gif') }}"
                    img="img-fluid" width="200" alt=""><br><br>
                <h4>Yakin ingin menghapus lowongan ?</h4>
            </div>
            <div class="modal-footer">
                <form
                    action="{{ route('lowongan.hapus', ['id' => $lowongan[0]->id_lowongan]) }}"
                    method="POST">
                    @csrf
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
