<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="turmas">
                        Home
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.waytoweb.com.br">Way to Web</a> Desenvolvimento de Software
        </p>
    </div>
</footer>

</div>
</div>

</body>

<script src="<?=base_url('assets/js/jquery.3.2.1.min.js')?>" type="text/javascript"></script> <!-- link do template -->
<script src="<?=base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script> <!-- link do template -->
<script src="<?=base_url('assets/js/chartist.min.js')?>"></script> <!-- link do template -->

<script src="<?=base_url('assets/js/light-bootstrap-dashboard.js?v=1.4.0')?>"></script> <!-- link do template -->
<script src="<?=base_url('assets/js/demo.js')?>"></script> <!-- link do template -->

<script src="<?=base_url('assets/tabela/js/jquery-1.10.2.js')?>"></script> <!--link tabela-->
<script src="<?=base_url('assets/tabela/js/bootstrap.js')?>"></script> <!--link tabela-->
<script src="<?=base_url('assets/tabela/js/dataTables/jquery.dataTables.js')?>"></script> <!--link tabela-->
<script src="<?=base_url('assets/tabela/js/dataTables/dataTables.bootstrap.js')?>"></script> <!--link tabela-->
<script src="<?=base_url('assets/tabela/js/custom.js')?>"></script> <!--link tabela-->

<script src="<?=base_url('assets/js/bootstrap-notify.js')?>"></script> <!-- link do template -->

<link href="<?=base_url('assets/css/bootstrap-select.css')?>" rel="stylesheet" />
<script src="<?=base_url('assets/js/bootstrap-select.js')?>"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

          <?php if($this->session->flashdata()) : ?>
            $.notify({
                icon: 'pe-7s-gift',
                message: "<?=$this->session->flashdata($this->session->userdata('status_flashdata'))?>"

              },{
                  type: '<?=$this->session->userdata('status_flashdata')?>',
                  timer: 4000
              });
          <?php endif; ?>
        });
    </script>

</html>
