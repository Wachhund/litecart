<style>
.nav-tabs {
  background: transparent;
  border-bottom: none;
}
.nav-tabs .nav-link:not(.active) {
  background: #eee;
}
.tab-content {
  margin: 0;
  background: none;
}
#box-about table + table {
  margin-top: 2em;
}
#box-about tbody th {
  text-align: left;
}
#box-about tr > *:first-child {
  width: 250px;
}
#box-about meter {
  width: 500px;
}
#box-error-log tr.critical {
  background: #c002;
}
#box-error-log td {
  white-space: wrap !important;
  cursor: default;
}
#box-error-log td {
  vertical-align: top;
}
</style>

<nav class="nav nav-tabs">

    <a class="nav-link active" data-toggle="tab" href="#tab-system">
      <?php echo language::translate('title_system', 'System'); ?>
    </a>

    <a class="nav-link" data-toggle="tab" href="#tab-errors">
      <?php echo language::translate('title_error_log', 'Error Log'); ?>
    </a>

    <a class="nav-link" data-toggle="tab" href="#tab-logs">
      <?php echo language::translate('title_error_logs', 'Logs'); ?>
    </a>

  </nav>

  <div class="tab-content">
    <div id="tab-system" class="tab-pane active">
      <div id="box-about" class="card">
        <div class="card-header">
          <div class="card-title">
            <?php echo PLATFORM_NAME; ?> <?php echo PLATFORM_VERSION; ?>
          </div>
        </div>

        <table class="table table-striped data-table">
          <thead>
            <tr>
              <th colspan="2">Application</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>System Path</th>
              <td><?php echo FS_DIR_APP; ?></td>
            </tr>
            <tr>
              <th>Document Root</th>
              <td><?php echo DOCUMENT_ROOT; ?></td>
            </tr>
            <tr>
              <th>Web Path</th>
              <td><?php echo WS_DIR_APP; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-striped data-table">
          <thead>
            <tr>
              <th colspan="2">Machine</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Name</th>
              <td><?php echo $machine['name']; ?></td>
            </tr>
            <tr>
              <th>IP Address</th>
              <td><?php echo $machine['ip_address']; ?></td>
            </tr>
            <tr>
              <th>Hostname</th>
              <td><?php echo $machine['hostname']; ?></td>
            </tr>
            <tr>
              <th>Operating System</th>
              <td><?php echo $machine['os']['name']; ?></td>
            </tr>
            <tr>
              <th>Operating System Version</th>
              <td><?php echo $machine['os']['version']; ?></td>
            </tr>
            <tr>
              <th>System Architecture</th>
              <td><?php echo $machine['architecture']; ?></td>
            </tr>
            <tr>
              <th>CPU Usage</th>
              <td><?php echo !empty($machine['cpu_usage']) ? '<meter class="memory-usage" value="'. (float)$machine['cpu_usage'] .'" max="100" min="0" high="30" low="10" optimum="5"></meter>' : '<em>n/a</em>'; ?></td>
            </tr>
            <tr>
              <th>Memory Usage</th>
              <td><?php echo !empty($machine['memory_usage']) ? '<meter class="memory-usage" value="'. (float)$machine['memory_usage'] .'" max="100" min="0" high="30" low="10" optimum="5"></meter>' : '<em>n/a</em>'; ?></td>
            </tr>
            <tr>
              <th>Uptime</th>
              <td><?php echo !empty($uptime) ? $uptime : '<em>n/a</em>'; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-striped data-table">
          <thead>
            <tr>
              <th colspan="2">Web Server</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Daemon</th>
              <td><?php echo !empty($web_server['name']) ? $web_server['name'] : '<em>Unknown</em>'; ?></td>
            </tr>
            <tr>
              <th>SAPI</th>
              <td><?php echo $web_server['sapi']; ?></td>
            </tr>
            <tr>
              <th>Current User</th>
              <td><?php echo $web_server['current_user']; ?></td>
            </tr>
            <tr>
              <th>Enabled Modules</th>
              <td style="columns: 125px auto;">
                <div><?php echo !empty($web_server['loaded_modules']) ? implode('</div><div>', $web_server['loaded_modules']) : '<em>None</em>'; ?></div>
              </td>
            </tr>
          </tbody>
        </table>

        <table class="table table-striped data-table">
          <thead>
            <tr>
              <th colspan="2">PHP</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Version</th>
              <td><?php echo $php['version']; ?></td>
            </tr>
            <tr>
              <th>Whoami</th>
              <td><?php echo !empty($php['whoami']) ? $php['whoami'] : '<em>Unknown</em>'; ?></td>
            </tr>
            <tr>
              <th>PHP Extensions</th>
              <td style="columns: 125px auto;">
                <div><?php echo !empty($php['loaded_extensions']) ? implode('</div><div>', $php['loaded_extensions']) : '<em>None</em>'; ?></div>
              </td>
            </tr>
            <tr>
              <th>Disabled PHP Functions</th>
              <td><?php echo !empty($php['disabled_functions']) ? implode(', ', $php['disabled_functions']) : '<em>None</em>'; ?></td>
            </tr>
            <tr>
              <th>Memory Limit</th>
              <td><?php echo !empty($php['memory_limit']) ? $php['memory_limit'] : '<em>n/a</em>'; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-striped data-table">
          <thead>
            <tr>
              <th colspan="2">Database</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <th>Server Name</th>
              <td><?php echo $database['name']; ?></td>
            </tr>
            <tr>
              <th>Client Library</th>
              <td><?php echo $database['library']; ?></td>
            </tr>
            <tr>
              <th>Hostname</th>
              <td><?php echo $database['hostname']; ?></td>
            </tr>
            <tr>
              <th>User</th>
              <td><?php echo $database['user']; ?></td>
            </tr>
            <tr>
              <th>Database</th>
              <td><?php echo $database['database']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div id="tab-errors" class="tab-pane">
      <div id="box-error-log" class="card">
        <div class="card-header">
          <div class="card-title">
            <?php echo language::translate('title_error_log', 'Error Log'); ?>
          </div>
        </div>

        <?php echo functions::form_draw_form_begin('errors_form', 'post'); ?>

          <table class="table table-striped data-table">
            <thead>
              <tr>
                <th><?php echo functions::draw_fonticon('fa-check-square-o fa-fw checkbox-toggle', 'data-toggle="checkbox-toggle"'); ?></th>
                <th class="main"><?php echo language::translate('title_error', 'Error'); ?></th>
                <th><?php echo language::translate('title_occurrences', 'Occurrences'); ?></th>
                <th><?php echo language::translate('title_last_occurrence', 'Last Occurrence'); ?></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($errors as $error) { ?>
              <tr<?php echo $error['critical'] ? ' class="critical"' : ''; ?>>
                <td><?php echo functions::form_draw_checkbox('errors[]', $error['error'], !empty($_POST['parse']) ? 'disabled' : ''); ?></td>
                <td style="white-space: normal;"><?php echo functions::escape_html($error['error']); ?><br />
                  <div class="backtrace">
                    <?php echo nl2br(functions::escape_html($error['backtrace'])); ?>
                  </div>
                </td>
                <td class="text-center"><?php echo $error['occurrences']; ?></td>
                <td><?php echo language::strftime(language::$selected['format_datetime'], $error['last_occurrence']); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <div class="card-body">
            <div id="actions">
              <?php echo functions::form_draw_button('delete', language::translate('title_delete', 'Delete'), 'submit', 'class="btn btn-danger"', 'delete'); ?>
            </div>
          </div>

          <?php echo functions::form_draw_form_end(); ?>
      </div>
    </div>

    <div id="tab-logs" class="tab-pane">
      <div id="box-logs" class="card">
        <div class="card-header">
          <div class="card-title">
            <?php echo language::translate('title_logs', 'Logs'); ?>
          </div>
        </div>

        <?php echo functions::form_draw_form_begin('errors_form', 'post'); ?>

          <table class="table table-striped table-hover table-sortable data-table">
            <thead>
              <tr>
                <th><?php echo functions::draw_fonticon('fa-check-square-o fa-fw', 'data-toggle="checkbox-toggle"'); ?></th>
                <th class="main"><?php echo FS_DIR_STORAGE . 'logs/'; ?></th>
                <th class="text-end"><?php echo language::translate('title_size', 'Size'); ?></th>
                <th class="text-end"><?php echo language::translate('title_modified', 'Modified'); ?></th>
                <th class="text-end"><?php echo language::translate('title_created', 'Created'); ?></th>
              </tr>
            </thead>

            <tbody>
              <?php if (!empty($_GET['path']) && $_GET['path'] != '/') { ?>
              <tr>
                <td></td>
                <td colspan="6">
                  <?php echo functions::draw_fonticon('fa-arrow-left fa-fw fa-lg'); ?> <a href="<?php echo document::href_link(null, ['path' => (dirname($_GET['path']) == '.') ? '' : str_replace('\\', '/', dirname($_GET['path']))]); ?>"> <?php echo language::translate('title_back', 'Back'); ?></a>
                </td>
              </tr>
              <?php } ?>

              <?php foreach ($log_files as $log) { ?>
              <tr>
                <td><?php echo functions::form_draw_checkbox('log_files[]', $log['name']); ?></td>
                <td class="file"><?php echo functions::draw_fonticon('fa-file-text-o fa-fw fa-lg'); ?> <a href="<?php echo document::link(null, ['view_log_file' => $log['name']], ['app', 'doc']); ?>" data-toggle="lightbox" data-type="raw"><?php echo $log['name']; ?></a></td>
                <td class="text-end"><?php echo functions::file_format_size($log['size']); ?></td>
                <td class="text-end"><?php echo language::strftime(language::$selected['format_datetime'], $log['date_updated']); ?></td>
                <td class="text-end"><?php echo language::strftime(language::$selected['format_datetime'], $log['date_created']); ?></td>
              </tr>
              <?php } ?>
            </tbody>

            <tfoot>
              <td colspan="7">
                <?php echo language::translate('title_log_files', 'Log Files'); ?>: <?php echo count($log_files); ?>
              </td>
            </tfoot>
          </table>

          <div class="card-body">
            <div id="actions">
              <?php echo functions::form_draw_button('delete_log_file', language::translate('title_delete', 'Delete'), 'submit', 'class="btn btn-danger"', 'delete'); ?>
            </div>
          </div>

          <?php echo functions::form_draw_form_end(); ?>
      </div>
    </div>
  </div>
</div>

<script>
  <?php if (!empty($machine['cpu_usage']) || !empty($machine['memory_usage'])) { ?>
  setInterval(function(){
    $.ajax({
      cache: false,
      dataType: 'html',
      success: function(result){
        var $cpu_usage = $('meter.cpu-usage', result);
        var $memory_usage = $('meter.memory-usage', result);
        $('meter.cpu-usage').replaceWith($cpu_usage)
        $('meter.memory-usage').replaceWith($memory_usage)
      },
    });
  }, 3000);
  <?php } ?>

  $('.data-table :checkbox').change(function() {
    $('#actions').prop('disabled', !$('.data-table :checked').length);
  }).first().trigger('change');
</script>