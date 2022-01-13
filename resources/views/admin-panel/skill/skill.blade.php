    <h1
     style="text-align:center; 
     font-family: Arial, Helvetica, sans-serif;">
     DATA OF SKILL
    </h1>
    <table 
    style="border:1px solid #555;
    border-collapse: collapse;
    text-align:center;
    margin-left:20px;
    width:100%;
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;">
        <thead>
            <tr style="text-align:center;">
            <th style="border:1px solid #555;padding:5px;font-size:25px;">Name</th>
            <th style="border:1px solid #555;padding:5px;font-size:25px;">Percent</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
        <tr style="text-align:center;">
            <td style="border:1px solid #555;padding:5px;">{{$row->name}}</td>
            <td style="border:1px solid #555;padding:5px;">{{$row->percent}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
  
