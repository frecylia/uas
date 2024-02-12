<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
      function checkSession() {
        const formData = new FormData();
        formData.append('session_token', localStorage.getItem('session_token'));

        axios.post('https://cell2-frecylia.000webhostapp.com/session.php', formData)
        .then(response => {
          console.log(response);
          if (response.data.status === 'success') {
            const id = response.data.hasil.id || 'Default'
            const nama = response.data.hasil.nama || 'Default Name';
            const nomorhp = response.data.hasil.nomorhp || 'Default Nomor';
            const email = response.data.hasil.email || 'Default Email';
            const role = response.data.hasil.role || 'default';
            localStorage.setItem('id', id);
            localStorage.setItem('nama', nama);
            localStorage.setItem('nomorhp', nomorhp);
            localStorage.setItem('email', email);
            localStorage.setItem('role', role);
          } else {
            window.location.href = 'login.php';
          }
        })
        .catch(error => {
          console.error('Error Checking Session:', error);
        });
      }
      checkSession();
</script>