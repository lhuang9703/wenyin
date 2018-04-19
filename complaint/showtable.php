<div class="container">
<h1 class="text-center" >学生文印中心投诉窗口</h1>
<div  v-if="showdate" id='time1'></b>time</b></div>
</br>
<hr>
<div id="app">
		<div class="table-responsive">
		<table>
            <thead>
                <tr>
                    <th>时间段</th> 
                    <th>评分</th>
                    <th>吐槽</th>
                </tr>
            </thead> 
            <tbody >
                <tr>
                    <td> 
						  <select v-model="newShift.shift">
						  <option value =1>9:15-12:15</option>
						  <option value =2>12:15-15:15</option>
						  <option value =3>15:15-17:15</option>
						  <option value =4>17:15-21:15</option>
						</select>
					</td> 
                    <td>
                    	<select v-model="newShift.rate">
						  <option value =1>1分</option>
						  <option value =2>2分</option>
						  <option value= 3>3分</option>
						  <option value= 4>4分</option>
						  <option value= 5>5分</option>
						</select>
					</td> 
                    <td class="text-center">
                    	<textarea name="problem" rows="5" cols="30" v-model="newShift.complaint">please write our ploblems.</textarea>
                    	<button @click="createShift" id="handon">提交</button>
					</td>
                </tr>
            </tbody>
            </table>
			</div>
<br>

<hr>
<h2 class="text-center">提交记录</h2>
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
