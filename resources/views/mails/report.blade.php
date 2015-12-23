  @extends('mail-master')


  @section('mail-content')

        <div style="font-family: 'Helvetica'; font-size: .9em;">
            <div>
            <div style="text-align: center;">
                <h1>Freight Management System </h1>
                <p>P. O. Box AN 8901, Accra-North, Ghana</p>
                <p>Tel: 0302-68 30 30</p>  
                <p>Fax: 0302-68 30 31</p>    
            </div>
            <div>
                <p>Report for </p>
                <p>Date Range: </p>
                <p>Printed on: </p>
                <p>Staff Name: </p>
            </div>
                    <div>
                        <table style="
                            width: 100%; 
                            border: 1px solid black;
                            border-collapse: collapse;
                            margin: 10px auto;
                        ">
                            <thead>
                                <tr>
                                    <th style=" border: 1px solid black;">Client Name</th>
                                    <th style=" border: 1px solid black;">Product</th>
                                    <th style=" border: 1px solid black;">Transaction Description</th>
                                    <th style=" border: 1px solid black;">Cost</th>
                                    <th style=" border: 1px solid black;">Amount Paid</th>
                                    <th style=" border: 1px solid black;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style=" border: 1px solid black;">
                                    <td style=" border: 1px solid black;">data</td>
                                    <td style=" border: 1px solid black;">S4FD46FS4FSD4FS5</td>
                                    <td style=" border: 1px solid black;">Evening</td>
                                    <td style=" border: 1px solid black;">10:35PM</td>
                                    <td style=" border: 1px solid black;">10:35PM</td>
                                    <td style=" border: 1px solid black;">10:35PM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
        </div>

        @endsection           