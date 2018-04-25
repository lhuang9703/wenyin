//
//  main.cpp
//  ArrangeShift
//
//  Created by mov on 2018/4/23.
//  Copyright © 2018 wjp. All rights reserved.

//人、时间、班、选班下标都从0开始；
#include <iostream>
#include <map>
#include <queue>
#include <set>
#include <ctime>
#include <fstream>
#include <sstream>

using namespace std;

string file="****/info.txt";
string outfile="****/result.txt";
vector<string> id2num; //"id"与num的映射；

map<int, set<int> > bipartite;// =generate_staffWithSelect(); //选班二分图
map<int, set<int> > select_bi;  //排班过程中使用每个select连接相应的班；

//包括构建二分图
void read_txt(string file){
    ifstream fin(file);
    string line;
    int idx=0;
    while(getline(fin,line)){
        istringstream lin(line);
        string id; lin>>id; //读入id
        id2num.push_back(id);
        set<int> times;
        int shift_time;  //构建选班图
        while(lin>>shift_time){
           times.insert(shift_time);
        }
        bipartite[idx]=times;
        idx++;
    }
    fin.close();
}

//员工数 与 当班时间数
const int time_nums=28;
const int staff_nums=45;

//根据这个数组生成每个班；
int shift_max[time_nums]={2,3,3,3,2,3,3,3,2,3,3,3,2,3,3,3,2,3,3,3,2,2,2,2,2,2,2,2};
//每个班的持续时间
int shift_time[time_nums]={3,3,2,4,3,3,2,4,3,3,2,4,3,3,2,4,3,3,2,4,3,3,2,4,3,3,2,4};
//随机产生选班二分图， 真实情况下，应该从数据库或文件里读取；

map<int, set<int> > generate_staffWithSelect(){
    srand((unsigned)time(0));
    map<int, set<int> > mp;
    for(int i=0; i<staff_nums; i++){
        set<int> times;
        long j= rand()%29;      //从0到28个班都有可能；
        for(int k=0; k<j; k++){
            int t=rand()%28;    //一个时间段：1-28 //时间段可能重复
            times.insert(t);
        }
        mp[i]=times;
    }
    return mp;
}


struct staff_time_sum{
    int staff;
    int times_sum;
    //最小堆
    bool operator < (const struct staff_time_sum a) const  //重载 < 运算符自定义排序准则；
    {
        return times_sum > a.times_sum;
    }
};
priority_queue <staff_time_sum> heap;//永远取出当班时间最少的一个人；

map<int, set<int> > time2shift;   //每个时间对应的排班
map<int, set<int> > staff2select; //每个人对应选班的索引


//广搜，使用匈牙利算法；
bool dfs(int u, int* match,int* match_2, int* checked){
    for(set<int>::iterator it=select_bi[u].begin(); it!=select_bi[u].end();it++){
        int v= *it; //遍历u的每一个邻接点
        if(!checked[v]){
            checked[v]=true;
            if(match_2[v]==-1 || dfs(match_2[v], match,match_2, checked)){
                match[u]= v;
                match_2[v]=u;
                return true;
            }
        }
    }
    return false;
}
/*
 主函数在此！！！！！！！！！
 
 */

int main(){
    read_txt(file);
    
    time_t t_start= clock();
    int shift_nums=0;       //班的总个数
    for(int i=0; i< time_nums; i++){
        shift_nums+= shift_max[i];
    }
    
    cout<<shift_nums<<endl;
    
    int shift[shift_nums];   //每个班对应的时间
    
    for(int i=0,t=0;i<time_nums;){
        time2shift[i].insert(t);  //时间到班的快速索引
        shift[t++]= i;  //对应时间
        shift_max[i]--; //将最大班次减少
        if(shift_max[i]<=0) i++;
    }
    
    int select_nums=0;     // 选班的总个数；
    for(int i=0; i<bipartite.size(); i++){
        select_nums+= bipartite[i].size();
    }
    
    int select[select_nums];       //每个选班对应的人
    
    for(int i=0, t=0; i<staff_nums ; i++){
        for(set<int>::iterator it=bipartite[i].begin(); it!=bipartite[i].end(); it++){
            select[t]= i;       //从班到人的索引->数组
            staff2select[i].insert(t);  //从人到班的快速索引->map  //*it 人对应的时间
            for(set<int>::iterator it2=time2shift[*it].begin();it2 !=time2shift[*it].end();it2++)
                select_bi[t].insert(*it2);  //每个拆分的班次可以与改时间的班相匹配
            t++;
        }
    }
    for(int i=0; i<select_nums; i++)
        cout<<select[i]<<" ";
    cout<<endl;
    //初始化最小堆；
    for(int i=0; i<staff_nums; i++){
        struct staff_time_sum a;
        a.staff=i;
        a.times_sum=0;
        heap.push(a);
    }
    
    
    int match[select_nums]; //选班--> 班
    int match_2[shift_nums]; //班--->选班
    memset(match, -1, sizeof(match));//将其初始化为 -1
    memset(match_2, -1, sizeof(match_2));
    
    int checked[shift_nums]; //每一轮中，检查班是否被选；
    
    //改进后的匈牙利算法主函数 //注意，这个函数中，select2staff 这个索引会被改动
    int match_num=0;
    int iter=0; // 定义最大迭代次数
    
    while(match_num<shift_nums &&! heap.empty()&& iter++<1000000){
        //从最小堆中取当班时间最少的人
        struct staff_time_sum tem= heap.top();
        heap.pop();
        int st= tem.staff; //st是当班最少的人
        
        //找出此人的一个未匹配的选班；
        int i=-1;
        bool flag=false;
        for(set<int>::iterator it= staff2select[st].begin(); it!=staff2select[st].end(); it++){
            i=*it;  //一个选班的id
            if(match[i]==-1){
                flag=true;
                break;  //找到一个未匹配的，跳出
            }
        }
        
        if(!flag){     //这个人的所有选班都已经被匹配
            continue;//继续下一个循环 //实际上，把这个人丢弃
        }
        
        memset(checked, 0, sizeof(checked));
        if(dfs(i, match, match_2, checked)){
            ++match_num;
            tem.times_sum+= shift_time[match[i]];
            heap.push(tem);  //如果成功匹配，用加了时间的值更新优先队列
        }
        else{  //不成功匹配，则这个时间段已经无法找到，将这个班丢弃
            heap.push(tem);
            staff2select[st].erase(i);
        }
        
    }
    //排班已经完成；
    cout<<"子选班个数"<<select_nums<<endl;
    cout<<"子排班个数"<<shift_nums<<endl;
    //匹配结果
//    cout<<"match:"<<endl;
//    for(int i=0; i<select_nums; i++)
//        cout<<match[i]<<" ";
//    cout<<endl;
//    cout<<"match_2:"<<endl;
//    for(int i=0; i<shift_nums; i++)
//        cout<<match_2[i]<<" ";
//    cout<<endl;
    //得到每个班的排班结果
    map<int, vector<int> > result;
    map<int, int> total_time;
    for(int i=0; i<staff_nums; i++)
        total_time.insert(pair<int,int>(i,0));
    for(int i=0; i<select_nums; i++)
        if(match[i]!=-1){
            int t= shift[match[i]]; // 匹配到的班id 对应的时间
            int s= select[i];     //i班对应的人
            result[t].push_back(s);
            total_time[s]+=shift_time[t];
        }
    //输出每个班都有谁；
    for(int i=0; i<time_nums;i++){
        cout<<"第"<<i<<"班：  ";
        for(int j=0; j<result[i].size();j++){
            if(result[i][j]<id2num.size())
                cout<<id2num[result[i][j]]<<" ";
            else
                cout<<result[i][j]<<" ";
        }
        cout<<endl;
    }
    //统计每个人当班的时间：
    for(int i=0; i<staff_nums; i++){
        if(i<id2num.size())
            cout<<id2num[i]<<": "<<total_time[i]<<endl;
        else
            cout<<"第"<<i<<"个人"<<": "<<total_time[i]<<endl;
    }
    ofstream out(outfile);
    
    for(int i=0; i<time_nums;i++){
        out<<i<<" ";
        for(int j=0; j<result[i].size();j++){
            if(result[i][j]<id2num.size())
                out<<id2num[result[i][j]]<<" ";
        }
        out<<endl;
    }
    
    
    
    out.close();
    
    time_t t_end= clock();
    cout<<"花费时间"<<((double)t_end-t_start)/CLOCKS_PER_SEC<<endl;
    //linux 可能多一点，但感觉1s钟之内也排得完;
    return 0;
}
