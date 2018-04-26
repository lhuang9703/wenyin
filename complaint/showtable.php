<div class="container-narrow">
	<div class="jumbotron">
	<h1 >投诉窗口</h1>
	<p  v-if="showdate" id='time1'></b>time</b></p>
	</div>
	<br>
	<!-- <hr> -->
<div id="app">
		<div class="table-responsive">
		<table>
            <tbody >
                <tr>
					<th>时间:&nbsp &nbsp&nbsp &nbsp </th> 
                    <td> 
						  <select v-model="newShift.shift">
						  <option value =1>9:15-12:15</option>
						  <option value =2>12:15-15:15</option>
						  <option value =3>15:15-17:15</option>
						  <option value =4>17:15-21:15</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>评分:&nbsp &nbsp&nbsp &nbsp </th>
                    <td>
                    	<select v-model="newShift.rate">
						  <option value =1>1分</option>
						  <option value =2>2分</option>
						  <option value= 3>3分</option>
						  <option value= 4>4分</option>
						  <option value= 5>5分</option>
						</select>
					</td> 
				</tr>
				<tr>
					<th>吐槽:&nbsp &nbsp&nbsp &nbsp </th>
                    <td class="text-center">
                    	<textarea name="problem" rows="5" cols="30" v-model="newShift.complaint">please write our ploblems.</textarea>	
					</td>
                </tr>
				
            </tbody>
            </table>
			<br>
			&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
			<button @click="createShift" id="handon">提交</button>

		</div>
<br>

<hr>
<h2 class="text-center">记录提交结果</h2>
	<div class="table table-hover">
         <table>
            <thead>
                <tr>
                    <th>时间段</th> 
                    <th>评分</th>
                    <th>吐槽</th>
                </tr>
            </thead> 
        <tbody v-for="Shift in Items">
        	<tr>
        		<td>{{ Shift[0] }}</td>
        		<td>{{ Shift[1] }}</td>
        		<td>{{ Shift[2] }}</td>
        	</tr>
    	</tbody>
	</table>
	</div>

</div>
</div>
