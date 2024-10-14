<div class="container mt-5">
    <h1>Danh sách phim</h1>

    <!-- Hiển thị thông báo nếu có -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Chào mừng bạn đến với trang phim.</p>
    <!-- Danh sách phim sẽ được thêm ở đây -->
</div>
