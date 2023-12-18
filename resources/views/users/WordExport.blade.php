
    
    <h1 style="font-size: 20px;color:blue;">Welcome to the Exported Document</h1>

    <p>ทดสอบ.</p>

    <table border="1" >
        <tr>
            <th>วันที่</th>
            <th>รายละเอียด</th>
            <th>หมายเหตุ</th>
          </tr>
        @foreach ($reportstds as $key => $reportstd)
        <tr>
          <td>{{$reportstd->date_add}}</td>
          <td>
            <pre>{{$reportstd->detail}}</pre>
          </td>
          <td>{{$reportstd->note}}</td>

        </tr>
        @endforeach
        
    </table>

