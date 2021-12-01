<div class="modal fade" id="nilaiJawaban" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Jawaban</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data"
                    action="{{ route('jawaban.nilai.update', ['id_hasil_tes' => $hasilTes[0]->id_hasil_tes]) }}"
                    method="POST" class="col-md-12" id="form-nilaiJawaban">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="soal">Nilai<span class="text-danger">*</span></label><br>
                        <input type="number" name="nilai" required class="form-control" @if (!empty($hasilTes->nilai))
                        value={{ $hasilTes->nilai }}
                    @else
                        placeholder="Nilai 0 ...."
                        @endif>
                    </div>

                    <div class="modal-footer" style="border:none;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Nilai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
