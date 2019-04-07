#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <fstream>
#include <ctype.h>
#include <vector>
#include <map>
#include <iostream>
// #include <sstream>

/*
PL: ToyBox
Authors: Roven Rommel Fuentes
	 Roinand Aguila
 	 Mary Grace Angelie Aguirre
	 Diana Magbanua

Status: Creation of parse tree
Last Edited: May 19, 2015
ADD semantic analysis for char+int
*/

#define MAXWORD 500 //maximum word size

using namespace std;

typedef enum{
    tokRDUCKY,tokNUMBLK,tokLETBLK,tokJROPE,tokMBOX,tokRACK,//datatype
    tokOPPLAY,tokCLPLAY,tokOPBOX,tokCLBOX,//functions
    tokADD,tokSUB,tokMULT,tokDIV,tokMOD, //arithmetic operators
    tokSMLR,tokBGGR,tokASMA,tokABIA,tokTSA,tokNTSA,//relational operators
    tokAND,tokOR,tokNOT,//logical operators
    tokUP,tokDWN,tokTIE,tokRULER,//other operators
    tokLPAR,tokRPAR,tokCOMMA,tokLBRAC,tokRBRAC,tokQUOTE,tokHASH,tokCOLON,tokEXCLA,//delimeter
    tokBOARD,tokHOLE,tokHOOLA,tokHOOP,tokFIND,tokVAL,//other keywords
    tokRETURN,tokSHOW,tokCOLLECT,tokSTOP,tokJUMP,tokEXPUNC,
    tokAS,//Assignment
    tokIDEN, //Identifier 50
    NAtk,   //51
    tokEND,tokTEXT, tokLET, //52 53 54
    tokON,tokOFF, //boolean //55 56
    tokGIVE, tokGET //function argument and parameter //57 58

}TokenType;

typedef struct tokenTag{
    //string str; 
    char str[MAXWORD];
    TokenType type; 
    int pos; //line number
}Token;

typedef enum{
    boxNode,decNode,idenNode,idenmorNode,valNode,hoolaNode,boardNode,conditionNode,playNode,
    showNode,outstrNode,collectNode,asgnNode,stmtNode,stmtmorNode,exprNode,op1Node,op2Node,
    op3Node,relOpNode,funcNode,func2Node,paramNode,param2Node,arguNode,argu2Node
}NodeType;

typedef struct nodeTag{
    NodeType type;
    Token token;
    struct nodeTag *child1;
    struct nodeTag *child2;
    struct nodeTag *child3;
    struct nodeTag *child4;
    struct nodeTag *child5;
}Node;


char arithOperator[]={'*','/','+','-','%'};
char delimeter[]={'(',')',',','[','"','#',':','='};
map<string,TokenType> reservedWord;
map<string,string> variableIdentifiers;
map<string,string> variableValues;
string code, data_type, data_var, function_type;
int offset=0,lineNum=0,tokcount=0, compareCounter=0, function_flag=0, loopflag=0, varFlag=0, paramCount=0;
Token *toks=NULL;
Token tk = {"N/A",NAtk,0};

//FUNCTIONS
void make_tokenmap();
int isReservedChar(char c);
int isDelimeter(char c);
TokenType getDelimeterType(char c);
int isArithOperator(char c);
TokenType getArithType(char c);
int isDatatype(TokenType type);
int isStmt(TokenType type);
Token anlzr();
int scan_code(string linestream,int &lineNum);
Node* createNode(NodeType type);
Node* value();
Node* iden_more();
Node* iden();
Node* declartn();
Node* op1();
Node* op2();
Node* op3();
Node* loop();
Node* expr();
Node* board();
Node* condition();
Node* showout();
Node* outstring();
Node* stmtset();
Node* box();
void parser();
Node* func_det();
Node* func();

void make_tokenmap(){
    //datatype
    reservedWord["RDUCKY"]=tokRDUCKY;
    reservedWord["NUMBLK"]=tokNUMBLK;
    reservedWord["LETBLK"]=tokLETBLK;
    reservedWord["JROPE"]=tokJROPE;
    reservedWord["MBOX"]=tokMBOX;
    reservedWord["RACK"]=tokRACK;
    //functions
    reservedWord["OPENBOX"]=tokOPBOX;
    reservedWord["CLOSEBOX"]=tokCLBOX;
    reservedWord["OPEN_PLAYPEN"]=tokOPPLAY;
    reservedWord["CLOSE_PLAYPEN"]=tokCLPLAY;
    //relational operator
    reservedWord["SMALLER_THAN"]=tokSMLR;
    reservedWord["BIGGER_THAN"]=tokBGGR;
    reservedWord["AS_SMALL_AS"]=tokASMA;
    reservedWord["AS_BIG_AS"]=tokABIA;
    reservedWord["THE_SAME_AS"]=tokTSA;
    reservedWord["NOT_THE_SAME_AS"]=tokNTSA;
    //logical operator
    reservedWord["AND"]=tokAND;
    reservedWord["OR"]=tokOR;
    reservedWord["NOT"]=tokNOT;
    //others
    reservedWord["LEVEL_UP"]=tokUP;
    reservedWord["LEVEL_DOWN"]=tokDWN;
    reservedWord["TIE_WITH"]=tokTIE;
    reservedWord["RULER"]=tokRULER;
    reservedWord["MATCHBOARD"]=tokBOARD;
    reservedWord["HOLE"]=tokHOLE;
    reservedWord["HOOLA"]=tokHOOLA;
    reservedWord["HOOP"]=tokHOOP;
    reservedWord["FIND_PLAYMATE"]=tokFIND;
    reservedWord["RETURN_TO_PLAYMATE"]=tokRETURN;
    reservedWord["SHOW"]=tokSHOW;
    reservedWord["COLLECT"]=tokCOLLECT;
    reservedWord["AS"]=tokAS;
    reservedWord["STOP"]=tokSTOP;
    reservedWord["JUMP"]=tokJUMP;
    //boolean
    reservedWord["ON"]=tokON;
    reservedWord["OFF"]=tokOFF;
    //function argument and parameter
    reservedWord["GIVE"]=tokGIVE;
    reservedWord["GET"]=tokGET;
     
}

int isReservedChar(char c){
    if (c=='(' || c==')' || c==',' || c=='[' || c==']' || c=='!' || c=='"' || c=='#' ||
	c==':' || c=='+' || c=='-' || c=='*' || c=='/' || c=='%' || c=='=' || c=='<' || 
	c=='>'){
	return 1;
    }else return 0;
}

int isDelimeter(char c){
    if (c=='(' || c==')' || c==',' || c=='[' || c==']' || c=='"' || c=='#' || c==':' || c=='!' ){
	return 1;
    }else return 0;
}

TokenType getDelimeterType(char c){
    if(c=='(') return tokLPAR;
    if(c==')') return tokRPAR;
    if(c==',') return tokCOMMA;
    if(c=='[') return tokLBRAC;
    if(c==']') return tokRBRAC;
    if(c=='"') return tokQUOTE;
    if(c=='#') return tokHASH;
    if(c==':') return tokCOLON;
    if(c=='!') return tokEXCLA;
}

int isArithOperator(char c){
    if (c=='+' || c=='-' || c=='*' || c=='/' || c=='%')
	return 1;
    else return 0;
}

int isArithmeticOperator2(Token *root, int tempI){
    //printf("\t\tval: %d ", root[tempI].type);
    if (root[tempI].type==10 || root[tempI].type==11 || root[tempI].type==12 || root[tempI].type==13 || root[tempI].type==14){
        //printf("%s ", root[tempI].str);
        return 1;
    }else{
         return 0;   
    }
}

TokenType getArithType(char c){
    if(c=='+') return tokADD;
    if(c=='-') return tokSUB;
    if(c=='*') return tokMULT;
    if(c=='/') return tokDIV;
    if(c=='%') return tokMOD;
}

int isDatatype(TokenType type){
   if(type==tokRDUCKY || type==tokNUMBLK || type==tokLETBLK || type==tokJROPE ||
      type==tokMBOX || type==tokRACK)
	return 1;
   else return 0;
}


int isStmt(TokenType type){
   if(type==tokFIND || type==tokBOARD || type==tokHOOLA || type==tokSHOW || type==tokCOLLECT || type==tokIDEN)
	return 1;
   else return 0;
}

int isRelOp(TokenType type){
   if(type==tokSMLR || type==tokBGGR || type==tokASMA || type==tokABIA || type==tokTSA || type==tokNTSA)
	return 1;
   else
	return 0;
}

Token anlzr(){
    int idx=0;
    Token token; 
    string temp; 
    for(int i=offset;i<code.size();i++){
	if(code[i]=='\n'){
	    lineNum++;
	    continue; 
	}

	if(code[i]=='-'){
	    if(code[i+1]=='-'){ //1-line comment
		while(code[i]!='\n'){i++;}
		lineNum++; 
		continue;
	    }
	}else if(code[i]=='<'){
	    if(code[i+1]=='!'){ //multi-line comment
		int lineidx=lineNum;
		while(!(code[i]=='!' && code[i+1]=='>')){
		    if(code[i]=='\n') lineNum++;
		    i++;
		    if(i==code.size()){ 
			printf("ERROR: The multi-line comment in line %d is not properly ended.\n",lineidx);
			exit(1);
		    }
		} i++;
		continue;
 	    }
	}else if(code[i]=='"'){
	    idx=i+1; //do not include "
	    while(!(code[++i]=='"')){} //CONCAT print's text
	    temp=code.substr(idx,i-idx).c_str();
	    strcpy(token.str, temp.c_str());
	    token.pos = lineNum;
	    token.type = tokTEXT;
	    offset = i+1;
	    return token;
	}else if(code[i]=='\''){
	    token.str[0]=code[++i];
    	    token.str[1]='\0'; 
	    token.pos = lineNum;
	    token.type = tokLET;
	    if(code[++i]!='\''){ 
		printf("ERROR: Invalid assignment to char typed variable in line %d.\n",lineNum);
		token.type = tokEND;
	    }
	    offset = ++i;
	    return token;
	}

	if(isalpha(code[i])){ //save keywords/identifiers 
    //dito babaguhin yung reserve word na gagamitin sa variables
	    idx=i;
	    while(isalnum(code[i]) || code[i]=='_'){i++;}
	    temp=code.substr(idx,i-idx).c_str();
            strcpy(token.str,temp.c_str());
	    token.pos = lineNum;
            if(reservedWord.find(temp)!=reservedWord.end()){ 
		  token.type = reservedWord.find(temp)->second;
	    }else{
		  token.type = tokIDEN; //identifier
	    }
	    //printf("%s\n",temp.c_str());
	    offset=i; 
	    return token;
	}else if(isdigit(code[i])){
	    idx=i;
            int dotcount=0,maxdecplace=0;
  	    while(isdigit(code[i]) || code[i]=='.'){
		i++; 
		if(code[i]=='.'){
		    dotcount++;
		    maxdecplace=1;
		}
		if(maxdecplace) maxdecplace++;
	    }
	    if(code[i-1]=='.' || dotcount>1){
		printf("ERROR: Invalid numerical value in line %d.\n",lineNum);
		token.type = tokEND;
	    }
	    if(maxdecplace>5){
		printf("ERROR: The decimal places of a number in line %d exceeds the limit(4).\n",lineNum);
		token.type = tokEND;
	    }
	    temp=code.substr(idx,i-idx).c_str();
	    strcpy(token.str, temp.c_str());
	    token.pos = lineNum;
	    token.type = tokVAL;
	    //printf("%s\n",temp.c_str());
	    offset = i--;
	    return token;
	}else if(ispunct(code[i])){
    	    token.str[0]=code[i];
    	    token.str[1]='\0'; 
	    if(isDelimeter(code[i])){
    		token.pos = lineNum;
    		token.type = getDelimeterType(code[i]);
	    }else if(isArithOperator(code[i])){
    		token.pos = lineNum; 
    		token.type = getArithType(code[i]); 
	    }else{ 
    		token.pos = lineNum;
    		token.type = tokEXPUNC;
	    }
	    //printf("%s\n",token.str);
	    offset = ++i;
	    return token;
	}
    }
    token.type = tokEND;
    return token;
}

int scan_code(string linestream,int &lineNum){ //check for invalid characters
    int wordsize=0;
    char word[MAXWORD];
    for(int i=0;i<linestream.size();i++){
	if(linestream[i]=='\n'){ 
	    lineNum++;
	    continue;
	}

	if(linestream[i]=='-'){ 
	    if(linestream[i+1]=='-'){ //ignore comments
		lineNum++;
		continue;
	    }
	}

    	if(isalnum(linestream[i])){
	    word[wordsize++]=linestream[i];
	    if(wordsize==MAXWORD){
		  printf("ERROR: A word in line %d is too long. \n",lineNum);
		  return 1;
	    }
	}else if(isspace(linestream[i]) || isReservedChar(linestream[i])){
	    wordsize = 0;
	}else if(ispunct(linestream[i])){
	    continue;
	}else{
	    printf("Error: Invalid character '%c' in line %d. \n",linestream[i],lineNum);
	    return 1;
	}

	
    }
}
Node* createNode(NodeType type){
    Node *node = (Node*) malloc(sizeof(Node));
    node->type = type;
    node->token;
    node->child1 =node->child2 =node->child3 =node->child4 =NULL;
    return node;
}

Node* value(){
    Node *node = createNode(valNode);
    if(tk.type==tokVAL){
        
        //printf("Value: %s \n",val.c_str());
        //printf("Variable: %s \n",var.c_str());

    	node->token = toks[offset]; //attach value to syntax tree
    	tk = toks[offset++]; 
    }else if(tk.type==tokLET){
        //printf("Value: %s \n",val.c_str());
        //printf("Variable: %s \n",var.c_str());

    	node->token = toks[offset]; //attach char to syntax tree
    	tk = toks[offset++]; 
    }else if(tk.type==tokON || tk.type==tokOFF){
        //printf("Value: %s \n",val.c_str());
        //printf("Variable: %s \n",var.c_str());

    	node->token = toks[offset]; //attach boolean to syntax tree
    	tk = toks[offset++]; 
    }else{
	printf("ERROR: %s is not the expected value in line %d.\n",tk.str,tk.pos);
   	exit(1);
    }
    //node->token=tk;
    return node;
}

Node* iden_more(string type){
    string var, val;
    Node *node = createNode(idenmorNode);
    if(tk.type==tokCOMMA){ //more variables of same type
    tk = toks[offset++];
    //type = tk.str;
	if(tk.type==tokIDEN){  //Variable Identifier
     	//TO DO:insert Var to list
        var = tk.str;
        //printf("STRING: %s \n", var.c_str());
        //printf("TYPE: %s \n", type.c_str());
        if(variableIdentifiers.count(tk.str)){
            printf("ERROR: Variable %s has been redeclared in line %d.\n",var.c_str(),tk.pos);
            exit(1);
        }else{
            variableIdentifiers[tk.str] = type;
        }
        
	    node->token = toks[offset]; //attach identifier to syntax tree
	    tk = toks[offset++]; 
	}else{
	    printf("ERROR: An identifier is expected in line %d.\n",tk.pos);
	    exit(1);
	}

    if(tk.type==tokAS){ //Value Assignment
        tk = toks[offset++];
        //printf("VALUE: %s \n", tk.str);
        val = tk.str;
        node->child1 = value();

        variableValues[var] = val;
        //TO DO: assign value to variable
	}
	node->child2 = iden_more(type);
    }else{
	return node;
    } 
}

Node* iden(){
   string var, type, val;
   Node *node = createNode(idenNode);
   if(isDatatype(tk.type)){  //check Variable Type
	type = tk.str;
    tk = toks[offset++]; 
	if(tk.type==tokIDEN){  //Variable Identifier
         //TO DO:insert Var to list
        var = tk.str;
        //printf("STRING: %s \n", var.c_str());
        //printf("TYPE: %s \n", type.c_str());
        
        if(variableIdentifiers.count(var)){
            printf("ERROR: The variable %s is already existing.\n",var.c_str());
            exit(1);
        }else{
            variableIdentifiers[var] = type;
        }

	    node->token = toks[offset]; //attach identifier to syntax tree
	    tk = toks[offset++]; 
	}else{
	    printf("ERROR: An identifier is expected in line %d.\n",tk.pos);
	    exit(1);
	}

    if(tk.type==tokAS){ //Value Assignment
	    tk = toks[offset++];
        //printf("VALUE: %s \n", tk.str);
        val = tk.str;
	    node->child1 = value();

        variableValues[var] = val;
	    //TO DO: assign value to variable
	}
	node->child2 = iden_more(type); //more variables of same type
        if(tk.type==tokHASH){ 
	    tk = toks[offset++]; 
	}else{
	    printf("ERROR: Line %d is not ended properly.\n",tk.pos);
	    exit(1);
	}
	return node; 
   }else{
	    return node; //declaration may be empty
   }
}

Node* declartn(){
    Node *node = createNode(decNode);
    if(isDatatype(tk.type)){
	node->token = toks[offset]; //attach identifier type to syntax tree
    	node->child1 = iden();
    	node->child2 = declartn();
    }
    return node;
}

Node* op3(){
    Node *node = createNode(op3Node);
    string type, var, value;
    int i, floatFlag;
    if(tk.type==tokLPAR){ 
	node->token = toks[offset]; //attach ( to syntax tree
        tk = toks[offset++]; 
        node->child1 = expr(); 
    	if(tk.type==tokRPAR){
            tk = toks[offset++];
            return node;
    	}else{
            printf("ERROR: Line %d expects ')'.\n",tk.pos);
            exit(1);
    	}
    }else if(tk.type==tokIDEN){
	    node->token = toks[offset]; //attach IDEN to syntax tree
        var = tk.str;
        //printf("VARIABLE %s \n", var.c_str());

        if(variableIdentifiers.count(var)){
            type = variableIdentifiers.find(var)->second;
            if(compareCounter == 0){
                data_type = type;
                compareCounter++;
            }
            //printf("DATA TYPE: %s \n", type.c_str());
            //printf("GLOBAL DATA TYPE: %s \n", data_type.c_str());
            if(type == data_type){
                tk = toks[offset++];
                compareCounter = 0;
                return node;
            }else{
                printf("ERROR: Conflicting data types. Line %d expects %s.\n",tk.pos,data_type.c_str());
                exit(1);
            }

        }else{
            printf("ERROR: Variable not declared in line %d. \n",tk.pos);
            exit(1);
        }

        
    }else if(tk.type==tokVAL){ 
        if(varFlag){
            varFlag = 0;
            value = tk.str;
            for(i=0; i<value.length(); i++){
                if(value[i]=='.'){
                    floatFlag = 1; //determine if int or float
                }

            }
            if(floatFlag){
                type = "RDUCKY";
            }else{
                type = "NUMBLK";
            }
            if(variableIdentifiers.count(data_var)==1){
                if(type == variableIdentifiers.find(data_var)->second){
                     node->token = toks[offset]; //attach VAL to syntax tree
                     tk = toks[offset++]; 
                     compareCounter = 0;
                     return node;
                }else{
                    printf("ERROR: Incorrect data type for variable %s. Expects %s in line %d.\n",data_var.c_str(),variableIdentifiers.find(data_var)->second.c_str(),tk.pos);
                    exit(1);
                }
            }
        }else{
            node->token = toks[offset]; //attach VAL to syntax tree
            tk = toks[offset++]; 
            compareCounter = 0;
            return node;
        }
	    
        
    }else if(tk.type==tokLET){
        if(varFlag){
            varFlag = 0;
            type="LETBLK";
            
            if(variableIdentifiers.count(data_var)==1){
                if(type == variableIdentifiers.find(data_var)->second){
                     node->token = toks[offset]; //attach LET to syntax tree
                     tk = toks[offset++]; 
                     compareCounter = 0;
                     return node;
                }else{
                    printf("ERROR: Incorrect data type for variable. Expects %s in line %d.\n",variableIdentifiers.find(data_var)->second.c_str(),tk.pos);
                    exit(1);
                }
            }
            
        }else{
            node->token = toks[offset]; //attach LET to syntax tree
            tk = toks[offset++]; 
            compareCounter = 0;
            return node;
        }
    }else if(tk.type==tokON || tk.type==tokOFF){
        if(varFlag){
            varFlag = 0;
            type="MBOX";
            
            if(variableIdentifiers.count(data_var)==1){
                if(type == variableIdentifiers.find(data_var)->second){
                     node->token = toks[offset]; //attach boolean to syntax tree
                     tk = toks[offset++]; 
                     compareCounter = 0;
                     return node;
                }else{
                    printf("ERROR: Incorrect data type for variable. Expects %s in line %d.\n",variableIdentifiers.find(data_var)->second.c_str(),tk.pos);
                    exit(1);
                }
            }
        }else{
            node->token = toks[offset]; //attach boolean to syntax tree
            tk = toks[offset++]; 
            compareCounter = 0;
            return node;
        }
    }else{
        printf("ERROR: Invalid expression. Line %d expects '(', an identifier or a value.\n",tk.pos);
        exit(1);
    }
}

Node* op2(){
    Node *node = createNode(op2Node); 
    if(tk.type==tokSUB){ //negation
	node->token = toks[offset]; //attach NEG to syntax tree
        tk = toks[offset++];
        node->child1 = op2();
        return node;
    }else{
     	node->child1 = op3();
	return node;
    }
}

Node* op1(){
    Node *node = createNode(op1Node); 
    node->child1 = op2(); 
    if(tk.type==tokADD){ 
	node->token = toks[offset]; //attach ADD to syntax tree
        tk = toks[offset++];
        node->child2 = op1();
        return node;
    }else if(tk.type==tokSUB){
	node->token = toks[offset]; //attach SUB to syntax tree
        tk = toks[offset++];
        node->child2 = op1();
        return node;
    }else{ 
        return node; //empty after op2
    }
}

Node* expr(){
    Node *node = createNode(exprNode); 
    node->child1 = op1();
    if(tk.type==tokMULT){
        node->token = toks[offset]; //attach MULT to syntax tree
        tk = toks[offset++];
        node->child2 = expr();
        return node;
    }else if(tk.type==tokDIV){
	node->token = toks[offset]; //attach DIV to syntax tree
        tk = toks[offset++];
        node->child2 = expr();
        return node;
    }else{
        return node; //empty after op1
    }
}

Node* relOp(){
    Node *node = createNode(relOpNode);
    node->token = toks[offset]; //attach OPERATOR to syntax tree
    if(tk.type==tokSMLR){
	    tk = toks[offset++];
    }else if(tk.type==tokBGGR){
	    tk = toks[offset++];
    }else if(tk.type==tokASMA){
	    tk = toks[offset++];
    }else if(tk.type==tokABIA){
	    tk = toks[offset++];
    }else if(tk.type==tokTSA){
	    tk = toks[offset++];
    }else if(tk.type==tokNTSA){
	    tk = toks[offset++];
    }else{
    	printf("ERROR: Relational operator is missing in line %d.\n",tk.pos);
    	exit(1);
    }
}

Node* loop(){
    Node *node = createNode(hoolaNode);
    node->child1 = expr();
    node->child2 = relOp();
    node->child3 = expr();
    
    if(tk.type==tokEXCLA){
	    tk = toks[offset++]; 
    }else{
	    printf("ERROR: Incorrect hoola format in line %d. '!' is required after the expression.\n",tk.pos);
	    exit(1);
    }
    node->child4=stmtset();
    if(tk.type==tokHOOP){
	    tk = toks[offset++]; 
    }else{
	    printf("ERROR: Hoola is not closed properly in line %d.\n", tk.pos);
	    exit(1);
    }
    return node;
}

Node* board(){
    Node *node = createNode(boardNode);

    if(tk.type==tokLBRAC){
        tk = toks[offset++];
        
        if(tk.type==tokHOLE){ //first HOLE
            tk = toks[offset++];
            node->child1 = expr();
            node->child2 = relOp();
            node->child3 = expr();
            
            if(tk.type==tokCOLON){
                tk = toks[offset++];
                node->child4 = stmtset();
                node->child5 = condition(); //more HOLES

                if(tk.type==tokRBRAC){
                    tk = toks[offset++];
                }else{
                    printf("ERROR: Invalid MATCHBOARD statement in line %d; expecting ']' at the end of condition.\n",tk.pos);
                    exit(1);
                }
                return node;

            }else{
                printf("ERROR: Invalid HOLE statement in line %d. \n",tk.pos);
                exit(1);
            } 
        }else{
            printf("ERROR: Expecting HOLE keyword in line %d. \n",tk.pos);
            exit(1);
        }
    }else{
        printf("ERROR: Invalid MATCHBOARD statement in line %d; expecting '[' after the keyword MATCHBOARD.\n",tk.pos);
        exit(1);
    }

}

Node* condition(){
    Node *node = createNode(conditionNode);

    if(tk.type==tokHOLE){
        tk = toks[offset++];
        if(tk.type==tokCOLON){ //HOLE without condition
            tk = toks[offset++];
            node->child1 = stmtset();
            return node;
        }else{
            // printf("STRING: %s \n", tk.str);
            node->child1 = expr();
            node->child2 = relOp();
            node->child3 = expr();
            if(tk.type==tokCOLON){
                tk = toks[offset++];
                node->child4 = stmtset();
                node->child5 = condition();
                return node;
            }else{
                printf("ERROR: Invalid HOLE statement in line %d. \n",tk.pos);
                exit(1);
            }  
        }
    }else{
        //null
        return node;
    }
    
}

Node* argumore(){
    string var;
    Node *node = createNode(argu2Node);
    if(tk.type==tokCOMMA){
	tk = toks[offset++]; 
	if(tk.type==tokIDEN){
        //check if the variable is declared
        var = tk.str;
        if(variableIdentifiers.count(var) == 0){
            printf("ERROR: Variable %s is not declared in line %d.\n",var.c_str(),tk.pos);
            exit(1);
        }
        paramCount++;
	    node->token = toks[offset]; //attach identifier type to syntax tree
	    tk = toks[offset++]; 
	    node->child1 = argumore();
        }else{
	    printf("ERROR: Expecting an identifier after the comma in line %d.\n",tk.pos);
	    exit(1);
	}
    }
    return node;
}

Node* argu(){
    string var;
    Node *node = createNode(arguNode);
    if(tk.type==tokGIVE){
	   tk = toks[offset++]; 
	   if(tk.type==tokIDEN){
            //check if the variable is declared
            var = tk.str;
            if(variableIdentifiers.count(var) == 0){
                printf("ERROR: Variable %s is not declared in line %d.\n",var.c_str(),tk.pos);
                exit(1);
            }
            paramCount++;
    	    node->token = toks[offset]; //attach identifier type to syntax tree
    	    tk = toks[offset++]; 
    	    node->child1 = argumore();
        }else{
    	    printf("ERROR: Expecting an identifier after the GIVE token in line %d.\n",tk.pos);
    	    exit(1);
    	}
    }
    return node;

}

Node* findplaymate(){
    Node *node = createNode(playNode);
    string var, type, val;
    //Get FUNCTION name
    if(tk.type==tokIDEN){
    var = tk.str;
    //printf("STRING: %s \n", var.c_str());
    //printf("TYPE: %s \n", type.c_str());
    //type = "VOID";

    if(function_flag){
       if(variableIdentifiers.count(tk.str)){
        //     printf("ERROR: Variable %s has been redeclared in line %d.\n",var.c_str(),tk.pos);
        //     exit(1);
        // }else{
            variableIdentifiers[tk.str] = function_type;
        }
        function_flag = 0; 
    }else{
        variableIdentifiers[tk.str] = function_type;
    }
    

	node->token = toks[offset]; //attach FUNCTION name to syntax tree

	tk = toks[offset++]; 
    }else{
    	printf("ERROR: Invalid function call in line %d.\n",tk.pos);
    	exit(1);
    }

    node->child1 = argu();

    if(tk.type==tokHASH){
        tk = toks[offset++];
    }else{
        //error end with hash
        printf("ERROR: No line terminator(#) in line %d.\n", tk.pos);
        exit(1);
    }
    return node;
}

Node* showout(){
    Node *node = createNode(showNode);
    string tempString;

    
    if(tk.type==tokTEXT){ // "string" <outstring>
        // "string" <outstring>
        //tk = toks[offset++];
        //to capture the whole string even if the string has spaces
        /*tempString = tk.str;
        while(tk.type != tokQUOTE){
	    if(offset==tokcount-1){
	    	printf("ERROR: Invalid SHOW statement in line %d.\n",tk.pos);
	    	exit(1);
            }
            tk = toks[offset++];
            tempString = tempString + tk.str;
        }*/
	//NOTE: print line(MAXWORD<linesize)
	//printf("STRING: %s\n", tk.str);
	node->token = toks[offset]; //attach tokTEXT to syntax tree
        tk = toks[offset++];
        node->child1 = outstring();

        if(tk.type==tokHASH){
	   tk = toks[offset++];
        }else{
            //error end with hash
            printf("ERROR: No line terminator(#) or invalid SHOW statement in line %d.\n", tk.pos);
            exit(1);
        }
        return node;
    }else{ //<expr><more>
        node->child1 = expr();
        node->child2 = outstring();
        
        if(tk.type==tokHASH){
            tk = toks[offset++];
        }else{
            //error end with hash
            printf("ERROR: No line terminator(#) or invalid SHOW statement in line %d.\n", tk.pos);
            exit(1);
        }

        return node;
    }
}

Node* outstring(){
    Node *node = createNode(outstrNode);
    string tempString;
    
    // "string" <outstring>
    if(tk.type==tokCOMMA){
	tk = toks[offset++];
    	if(tk.type==tokTEXT){
            // "string" <outstring>
            //tk = toks[offset++];
            //to capture the whole string even if the string has spaces
            /*tempString = tk.str;
            while(tk.type != tokQUOTE){
	    	if(offset==tokcount-1){
	    	    printf("ERROR: Invalid SHOW statement in line %d.\n",tk.pos);
	    	    exit(1);
                }
            	tk = toks[offset++];
            	tempString = tempString + tk.str;
            }*/
            //NOTE: print line(MAXWORD<linesize)
	    //printf("STRING: %s\n", tk.str);
	    node->token = toks[offset]; //attach text to syntax tree
            tk = toks[offset++];
            node->child1 = outstring();
            return node;
    	}else{
            node->child1 = expr();
            node->child2 = outstring();
            return node;
	}
    }else{
        //tk = toks[offset++];
        return node;
    }
}

Node* collectout(){
    Node *node = createNode(collectNode);
    string type, var;

    if (tk.type == tokIDEN) {
	    node->token = toks[offset]; //attach IDENTIFIER to syntax tree
        var = tk.str;
        tk = toks[offset++];

        if(variableIdentifiers.count(var)==0){
            printf("ERROR: Variable not declared in line %d.\n", tk.pos);
            exit(1);
        } //check if the variable is declared

        if (tk.type == tokHASH) {
            tk = toks[offset++];
            return node;
        } else {
            printf("ERROR: No line terminator(#) in line %d.\n", tk.pos);
            exit(1);
        }
    }else{
        printf("ERROR: Expecting an identifier, but received %s on line %d \n", tk.str, tk.pos);
        exit(1);
    }

}

Node* assignVal(){
    Node *node = createNode(asgnNode);
    string type, var;

    node->token = toks[offset]; //attach IDENTIFIER to :syntax tree
    var = tk.str;
    
    tk = toks[offset++];
    if (tk.type == tokAS) {
        tk = toks[offset++];
    	if(tk.type==tokFIND){ //get return value from function
    	    
            tk = toks[offset++];
    	    //Get FUNCTION name
            function_flag = 1;
            function_type = variableIdentifiers.find(var)->second;
    	    node->child1 = findplaymate();
        	
        }else{
            if(variableIdentifiers.count(var)==0){
            	printf("ERROR: Variable not declared in line %d.\n", tk.pos);
            	exit(1);
            } //check if the variable is declared
            type = variableIdentifiers.find(var)->second;
            //printf("VARIABLE %s \n", var.c_str());
            //printf("DATA TYPE: %s \n", type.c_str());

            compareCounter++;
            data_type = type;
            data_var = var;
            varFlag = 1;
            node->child1 = expr();

            if (tk.type == tokHASH) {
            	tk = toks[offset++];
            	return node;
            }else {
            	printf("ERROR: No line terminator(#) in line %d.\n", tk.pos);
            	exit(1);
            }

        }
    
    } else {
        printf("ERROR: expect 'AS', but received %s in line %d \n", tk.str, tk.pos);
        exit(1);
    }

}

Node* statement(){
    Node *node = createNode(stmtmorNode);
    node->token = toks[offset]; //attach statement type to syntax tree
    if(tk.type==tokHOOLA){
	tk = toks[offset++]; 
	node->child1 = loop();
	return node;
    }else if(tk.type==tokBOARD){
	tk = toks[offset++]; 
	node->child1 = board();
	return node;
    }else if(tk.type==tokFIND){ 
	tk = toks[offset++]; 
	node->child1 = findplaymate();
	return node;
    }else if(tk.type==tokSHOW){
	tk = toks[offset++]; 
	node->child1 = showout();
	return node;
    }else if(tk.type==tokCOLLECT){
	tk = toks[offset++]; 
	node->child1 = collectout();
	return node;
    }else if(tk.type==tokIDEN){ 
	node->child1 = assignVal();
	return node;
    }else{
	    printf("Error: Cannot recognize line %d as a valid statement.\n",tk.pos);
	    exit(1);
    }
}

Node* stmtset(){
    Node *node = createNode(stmtNode);
    if(isStmt(tk.type)){
    	node->child1 = statement();
    	node->child2 = stmtset();
    }
    return node;
}

Node* parammore(){
    Node *node = createNode(param2Node);
    if(tk.type==tokCOMMA){
	tk = toks[offset++]; 
	if(tk.type==tokIDEN){
        paramCount--;
	    node->token = toks[offset]; //attach identifier type to syntax tree
	    tk = toks[offset++]; 
	    node->child1 = parammore();
        }else{
	    printf("ERROR: Expecting an identifier after the comma in line %d.\n",tk.pos);
	    exit(1);
	}
    }
    return node;
}

Node* param(){
    Node *node = createNode(paramNode);
    if(tk.type==tokGET){
	tk = toks[offset++]; 
	if(tk.type==tokIDEN){
        paramCount--;
	    node->token = toks[offset]; //attach identifier type to syntax tree
	    tk = toks[offset++]; 
	    node->child1 = parammore();
        }else{
	    printf("ERROR: Expecting an identifier after the GET token in line %d.\n",tk.pos);
	    exit(1);
	}

    if(tk.type==tokHASH){
        if(paramCount != 0){
            printf("ERROR: Not equal parameter count in line %d.\n",tk.pos);
            exit(1);
        }
	    tk = toks[offset++];
	}else{
	    printf("ERROR: Parameters in line %d is not ended properly.\n",tk.pos);
	    exit(1);
	}
    }
    return node;

}

Node* func_det(){
    Node *node = createNode(func2Node);
    tk = toks[offset++]; 
    //Get FUNCTION name
    if(tk.type==tokIDEN){
	node->token = toks[offset]; //attach FUNCTION name to syntax tree
	tk = toks[offset++]; 
    }else{
	printf("ERROR: No function name in line %d.\n",tk.pos);
	exit(1);
    }
    
    if(tk.type==tokCOLON){
	tk = toks[offset++]; 
    }else{
	printf("ERROR: Semi-colon is needed after the function name in line %d.\n",tk.pos);
	exit(1);
    }	
    
    node->child1 = param(); 
    node->child2 = declartn();
    node->child3 = stmtset();

    if(tk.type==tokRETURN){ //return value
	tk = toks[offset++];
	node->child4 = expr();
    
	if (tk.type == tokHASH) {
            tk = toks[offset++];
        } else {
            printf("ERROR: No line terminator(#) in line %d.\n", tk.pos);
            exit(1);
        }
    }

    if(tk.type==tokCLPLAY){
	tk = toks[offset++]; 
	return node;
    }else{
	printf("ERROR: Function in line %d does not have close tag.\n", tk.pos);
	exit(1);
    }
    
}

Node* func(){
    Node *node = createNode(funcNode);
    if(tk.type==tokOPPLAY){ 
	node->child2 = func_det();
	node->child1 = func();
    } 
    return node;
}

Node* box(){
    Node *node = createNode(boxNode);
    if(tk.type==tokOPBOX){ //open Program
	   tk = toks[offset++];
    }else{
       	printf("ERROR: Invalid start of the code. %s\n",tk.str);
	exit(1);
    }

    node->child1 = declartn();
    node->child2 = stmtset();
    node->child3 = func();

    if(offset<tokcount-1){ //non-stmtset line before CLBOX
	    printf("ERROR: Invalid statement in line %d.\n",tk.pos);
	    exit(1);
    }

    if(tk.type==tokCLBOX){ //close Program
	    tk = toks[offset++];
	return node;
    }else{
   	    printf("ERROR: Invalid closing of the code.\n");
	    exit(1);
    }
    
}

void parser(){
    tk = toks[offset++];
    Node *root = NULL;
    root = box();
    
    if(tk.type=tokEND) //tk is global so tk will be the end node if parsing works fine
	    printf("Successful parsing!\n");
    else{
	    exit(1);
    }
}

/*-------------------------------------------START OF IR FUNCTIONS----------------------------------------------------*/


void writeToFile2(int arr[], int count, Token *ptr, int x){         //x = position of token in tree
    std::ofstream fp2;
    int c = count;
    //printf("\n\tWRITETOFILE CALL: %d---%d---%d",arr[c], c, x);
    fp2.open("translated.c", ios::app);
    if(fp2.is_open()){
            switch(arr[c]){
                case 0: 
                        fp2 << "\tfloat  ";
                        break;
                case 1: 
                        fp2 << "\tint  ";
                        break;
                case 2: 
                        fp2 << "\tchar  ";
                        break;
                case 3: 
                        fp2 << "\tstring  ";
                        break;
                case 4:
                        fp2 << "\tint ";
                        break;
                case 5: 
                        fp2 << "\tint[]  ";
                        break;
                case 6: 
                        fp2 << "\n\t "; 
                            break;
                case 7: 
                        fp2 << "\n}\n";
                        break;
                case 8:
                        fp2 << "\nmain(){\n";
                        break;
                case 9: 
                        fp2 << "\n\n\n}\n";
                        break;   
                case 10:
                        fp2 << "  +  ";
                        break;
                case 11: 
                        fp2 << "  -  ";
                        break;
                case 12: 
                        fp2 << "  *  ";
                        break;
                case 13: 
                        fp2 << "  /  ";
                        break;
                case 14: 
                        fp2 << "  %%  ";
                        break;
                case 15:
                        fp2 << "  <  ";
                        break;
                case 16: //printf(">\n");
                        fp2 << "  >  ";
                        break;
                case 17: //printf("<=\n");
                        fp2 << "  <=  ";
                        break;
                case 18: //printf(">=\n");
                        fp2 << "  >=  ";
                        break;
                case 19: //printf("==\n");
                        fp2 << "  ==  ";
                        break;
                case 20: //printf("!=\n");
                        fp2 << "  !=  ";
                        break;
                case 21: //printf("&&\n"); 
                        fp2 << "  &&  ";
                        break;
                case 22: //printf("||\n"); 
                        fp2 << "  ||  ";
                        break;
                case 23: //printf("!\n");
                        fp2 << "  !  ";
                        break;
                case 24: //printf("++\n"); 
                        fp2 << "++  ";
                        break;
                case 25: //printf("--\n"); 
                        fp2 << "--  ";
                        break;
                case 26: //printf("concat()\n");
                        break;
                case 27: //printf("length()\n");
                        break;
                case 28: //printf("(\n"); 
                        fp2 << " ( ";
                        break;
                case 29: //printf(")\n"); 
                        fp2 << " ) ";
                        break;
                case 30: //printf(",\n");
                        fp2 << " , ";
                        break;
                case 31: //printf("[\n");
                        fp2 << "  ";
                        break;
                case 32: //printf("]\n");
                        fp2 << "  \n\t}";
                        break;
                case 33: //printf("quote\n");
                        fp2 << " \" ";
                        break;
                case 34: //printf("#\n");
                        fp2 << " ;  \n";                                    
                        break;
                case 35: //printf("colon\n");
                        fp2 << "){ \n";
                        break;
                case 36: //printf("excla\n");
                        fp2 << " ){ \n ";
                        break;
                case 37: //printf("switch\n"); 
                        //fp2 << "\nswitch( ";
                        break;
                case 38: //printf("case\n");
                        fp2 << "\n\tif( ";
                        //fp2 << "\n\tcase ";
                        break;
                case 39: //printf("while\n");
                        fp2 << "\n\twhile( ";
                        break;
                case 40: //printf("condition for while\n");
                        fp2 << "\n\t}\n";
                        break;
                case 41: //printf("find\n");
                        //call function
                        break;
                case 42: //printf("value\n"); 
                        fp2 << ptr[x].str << " ";
                        break;
                case 43: //printf("return\n"); 
                        fp2 << "\n\treturn ";
                        break;
                case 44: //printf("printf\n");
                        fp2 << "\tprintf( ";
                        break;
                case 45: //printf("scanf\n"); 
                        fp2 << "\tscanf( ";                     //NOT YET DONE, scanf for other cases: float, char, string
                        break;
                case 46: //printf("break\n"); 
                        fp2 << "\nbreak; ";
                        break;
                case 47: //printf("continue\n"); 
                        fp2 << "\ncontinue;";
                        break;
                case 48: //printf("! as end for loop\n");
                        fp2 << " ){  \n";
                        break;
                case 49: //printf("=\n");
                        fp2 << " = ";
                        break;
                case 50: fp2 << " " << ptr[x].str;
                        break;
                case 51: printf("NA");
                        break;
                case 52: printf("end of input stream\n");
                        break;
        		case 53: fp2 << "\"" << ptr[x].str << "\"";
        			break;
        		case 54: fp2 <<  "\'" << ptr[x].str << "\'";
        			break;                
                case 55: fp2 <<  " 1"; //ON
                    break;
                case 56: fp2 <<  " 0"; //OFF
                    break;
        		case 100: fp2 << "\"%d\"";
                                break;
                default: break;
            }    //end of switch;
            
    }//end of if

    fp2.close();
    
    
    
}//end of function

void print_format_code(int arr[], int count, Token *ptr, int x){
    string type;
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        
        type = variableIdentifiers.find(ptr[x].str)->second;
        //printf("String: %s \n", ptr[x].str);
        //printf("Type: %s \n", type.c_str());
        if(type == "RDUCKY"){
            fp << "\"%f\", ";
        }else if(type == "NUMBLK"){
            fp << "\"%d\", ";
        }else if(type == "LETBLK"){
            fp << "\"%c\", ";
        }
        fp.close();
    }
}
void print_format_code2(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << "\"%d\" ";
        fp.close();
    }
}
void add_ampersand(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " &";
        fp.close();
    }   
}
void print_printf_code(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " ); printf";
        fp.close();
    }
}

void print_printf_code2(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " ); printf(";
        fp.close();
    }
}
//additional symbol for print
void add_end_sym_p(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " ) ";
        fp.close();
    }
}
void add_end_delim_if(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " \t} ";
        fp.close();
    }
}
void add_else_to_if(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " \t}else ";
        fp.close();
    }
}
void add_else(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " \t}else{ ";
        fp.close();
    }
}
void add_newline(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " \n ";
        fp.close();
    }
}
void add_func_delims(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp<<"() ";
        fp.close();
    }   
}
void add_func_delims2(){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp<<"(";
        fp.close();
    }   
}
void add_evaluated_expr(int value){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp<< " " << value;
        //printf("%d \n", value);
        fp.close();
    }   
}
void add_func_params(){
    printf("\t\tADD FUNC PARAMS");

}
void add_colon_sym(){
 std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        fp << " ){";
        //printf("%d \n", value);
        fp.close();
    }      
}

void print_data_type_for_func(string value){
    std::ofstream fp;
    fp.open("translated.c", ios::app);
    if(fp.is_open()){
        if(value == "NUMBLK"){
            value = "int";
        }else if(value == "RDUCKY"){
            value = "float";
        }else if(value == "MBOX"){
            value = "bool";
        }else if(value == "LETBLK"){
            value = "char";
        }
        fp<< " " << value.c_str();
        //printf("%d \n", value);
        fp.close();
    }   
}

//function to check SHOW conversion
void printf_analyze(int tempArr[], int tempCtr,int *currJ, Token *root, int *currIHolder){
    int j;
    int iHolder;

    j = *currJ;
    iHolder = *currIHolder;
    
    if(tempArr[j]==44){                                                     //token=SHOW?
        
        writeToFile2(tempArr,j,root, iHolder);
        j++; iHolder++;
        
        while(tempArr[j]!=34){
            
            if(tempArr[j]==50 && tempArr[j-1]==44){                                             //if token is a variable beside SHOW e.g SHOW id#
                

                print_format_code(tempArr,j,root, iHolder);
                writeToFile2(tempArr,j,root, iHolder);
                j++; iHolder++;

                

                if(tempArr[j]==30){                                         //if token is a comma, may kasunod pang declaration
                    
                    
                    while(tempArr[j]!=34){                                  //while not end of line, at may mga kasunod
                        if(tempArr[j]==30){
                            

                            print_printf_code2();                                        
                        }
                        j++; iHolder++;   
                                   
                        if(tempArr[j]==53){                                       //if token is a quote, text ang token                                                   
                            writeToFile2(tempArr,j,root, iHolder);
                            j++;iHolder++;
                            
                            //while(tempArr[j]!=33){                                          //while end of quote is not found write texts/tokens to file
                            //    writeToFile2(tempArr,j,root, iHolder);
                             //   j++; iHolder++;
                           // }
                           // if(tempArr[j]==33){                                         //if end quote is found, write it to file
                            //    writeToFile2(tempArr,j,root, iHolder);
                           // }
                        
                        }else if(tempArr[j]==50){                                             //if token is a variable
                            
                            print_format_code(tempArr,j,root, iHolder);
                            writeToFile2(tempArr,j,root, iHolder);
                            j++; iHolder++;
                        }
                    }//end of while
                }//end of if  
                                  
            }else if(tempArr[j]==53 && tempArr[j-1]==44){               //if token = quote beside SHOW (e.g SHOW "text")
                    writeToFile2(tempArr,j,root, iHolder);                  //write start quote to file                   
			j++; iHolder++;
                    
                   /* while(tempArr[j]!=33){                                  //while not the end quote for the tokens
                        writeToFile2(tempArr,j,root, iHolder);
                        j++;iHolder++;
                    }
                    
                    if(tempArr[j]==33){                                     //if token is the ending quote
                        writeToFile2(tempArr,j,root, iHolder);
                        j++;iHolder++;
                    }*/
                    
                    if(tempArr[j]==30){                                         //if token is a comma, may kasunod pang declaration
                        
                        while(tempArr[j]!=34){                                  //while not end of line, at may mga kasunod
                            if(tempArr[j]==30){
                                print_printf_code2();            
                            }
                            j++; iHolder++;   
                                   
                            if(tempArr[j]==53){                                       //if token is a quote, text ang token                                                   
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                                
                                /*while(tempArr[j]!=33){                                          //while end of quote is not found write texts/tokens to file
                                    writeToFile2(tempArr,j,root, iHolder);
                                    j++; iHolder++;
                                }
                                
                                if(tempArr[j]==33){                                         //if end quote is found, write it to file
                                    writeToFile2(tempArr,j,root, iHolder);
                                }*/
                            
                            }else if(tempArr[j]==50){                                             //if token is a variable
                                print_format_code(tempArr,j,root, iHolder);
                                writeToFile2(tempArr,j,root, iHolder);
                                j++; iHolder++;
                            }
                        }//end of while
                    } //end of if
                                
                               
            }else{
                j++;
                iHolder++;
            }
                           
        }
         if(tempArr[j]==34){                                               //if it's the end of statement(#) for print 
                add_end_sym_p();
                writeToFile2(tempArr,j,root, iHolder);
         }
         
    }
    //iHolder++;

    *currJ = j;
    *currIHolder = iHolder;

}

void ifelse_analyze(int tempArr[], int tempCtr,int *currJ, Token *root, int *currIHolder){
    int j;
    int iHolder;
    int holeCtr=0;

    j = *currJ;
    iHolder = *currIHolder;
            if(tempArr[j]==37){
                        j++; iHolder++;
                        if(tempArr[j]==31){                                                     //if = [
                            j++;iHolder++;
                        }
                    
                        while(tempArr[j]!=32){                                                  //while not the end of Matchboard ]
                            if(tempArr[j]==38 && tempArr[j+1]!=35){                                                     //if token is HOLE
                                holeCtr++;                                                                  //count the number of HOLE 
                                if(holeCtr==1){                                                  //it's the first hole
                                    writeToFile2(tempArr,j,root, iHolder);
                                    j++;iHolder++;
                                    while(tempArr[j]!=35){                                          //while not end of Hole ':'
                                        writeToFile2(tempArr,j,root, iHolder);
                                        j++;iHolder++;
                                    }

                                    if(tempArr[j]==35){                                                 //write end of statement symbol : to file as ({
                                        writeToFile2(tempArr,j,root, iHolder);
                                        j++;iHolder++;
                                    }
                                    if(tempArr[j]==44){                                             //may show sa loob ng hole
                                        printf_analyze(tempArr, tempCtr,&j,root, &iHolder);
                                        j++;iHolder++;
                                    }
                                    if(tempArr[j]==45){                                             //may collect sa loob ng hole
                                        writeToFile2(tempArr,j,root, iHolder);
                                        j++;iHolder++;
                                        while(tempArr[j]!=34){
                                            if(tempArr[j]==50){
                                                print_format_code(tempArr,j,root, iHolder);
                                                add_ampersand();
                                                writeToFile2(tempArr,j,root, iHolder);
                                                add_end_sym_p();
                                                j++;iHolder++;
                                            }
                                        }
                                        if(tempArr[j]==34){
                                            writeToFile2(tempArr,j,root, iHolder);
                                            j++;iHolder++;
                                        }
                                    }
                                      

                                }else if(holeCtr > 1){
                                    holeCtr++;
                                        add_else_to_if();
                                        writeToFile2(tempArr,j,root, iHolder);                          //write if to file
                                        j++;iHolder++;
                                        
                                        while(tempArr[j]!=35){                                          //while not end of Hole ':' and not the end or first hole
                                            writeToFile2(tempArr,j,root, iHolder);
                                            j++;iHolder++;
                                        }
                                        if(tempArr[j]==35){                                                 //write end of statement symbol : to file as ({
                                            writeToFile2(tempArr,j,root, iHolder);
                                            j++;iHolder++;
                                        }

                                }else{
                                    j++;iHolder++;
                                }
                            }else if(tempArr[j]==38 && tempArr[j+1]==35){                           //last HOLE
                                    add_else();
                                    j++;iHolder++;
                                

                                    if(tempArr[j]==35){                                                 //write end of statement symbol : to file as ({
                                        tempArr[j] = 31;
                                        writeToFile2(tempArr,j,root, iHolder);
                                        tempArr[j]==35;
                                        j++;iHolder++;
                                    }
                                    if(tempArr[j]==44){                                             //may show sa loob ng hole
                                        printf_analyze(tempArr, tempCtr,&j,root, &iHolder);
                                        j++;iHolder++;
                                    }
                                   
                                    add_newline();

                            }else if(tempArr[j]==44){       
                                printf_analyze(tempArr, tempCtr,&j,root, &iHolder);
                                 
                                 j++;iHolder++;
                                
                            }else if(tempArr[j]!=32){                                                              //others - declaration, loop etc
                                
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                            }else if(tempArr[j]==45){                                             //may collect sa loob ng hole
                                while(tempArr[j]!=34){
                                    if(tempArr[j]==50){
                                        print_format_code(tempArr,j,root, iHolder);
                                        add_ampersand();
                                        writeToFile2(tempArr,j,root, iHolder);
                                        add_end_sym_p();
                                        j++;iHolder++;
                                    }else{
                                        writeToFile2(tempArr,j,root, iHolder);
                                        j++;iHolder++;
                                    }
                                }
                                if(tempArr[j]==34){
                                    writeToFile2(tempArr,j,root, iHolder);
                                }
                                
                            }
                            if(tempArr[j]==41){                                                                 //may function call sa loob ng matchboard
                                j++;iHolder++;
                                writeToFile2(tempArr,j,root, iHolder);
                                add_func_delims();
                                j++;iHolder++;
                               
                            }
                        }//end of in-while
                        
                        

                        if(tempArr[j] == 32){                                                   //write end of matchbox ]
                            if(loopflag==1){
                                loopflag=0;
                            }else{
                                if(holeCtr==1){
                                   writeToFile2(tempArr,j,root, iHolder);
                                }else if(holeCtr>1){
                                    add_end_delim_if();
                                }         
                            }
                            

                        }
                    }
    *currJ = j;
    *currIHolder = iHolder;

}

void loop_analyze(int tempArr[], int tempCtr,int *currJ, Token *root, int *currIHolder){
    int j;
    int iHolder;
    int holeCtr=0;
    int value, value2;
   

    j = *currJ;
    iHolder = *currIHolder;
    if(tempArr[j]==39){
                        //printf("\ntempArr: %d | j: %d", tempArr[j], j);
                        writeToFile2(tempArr,j,root, iHolder);
                        j++;iHolder++;

                        while(tempArr[j]!=40){
                           // printf("\t\ttemp: %d j:%d\n", tempArr[j], j);
                            if(tempArr[j]==45){                                             //may collect sa loob ng LOOP
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                                while(tempArr[j]!=34){
                                    if(tempArr[j]==50){
                                        print_format_code(tempArr,j,root, iHolder);
                                        add_ampersand();
                                        writeToFile2(tempArr,j,root, iHolder);
                                        add_end_sym_p();
                                        j++;iHolder++;
                                    }
                                }
                                if(tempArr[j]==34){
                                  //  writeToFile2(tempArr,j,root, iHolder);
                                }
                                
                            }
                            if(tempArr[j]==39){                                         //loop inside loop
                                loop_analyze(tempArr,tempCtr,&j,root,&iHolder);
                            }
                            if(tempArr[j]==37){                                                         //may if else sa loob ng LOOP
                                loopflag = 1;
                                ifelse_analyze(tempArr, tempCtr,&j,root, &iHolder);
                               // j++;iHolder++;    
                            }
                            if(tempArr[j]==44){
                                printf_analyze(tempArr, tempCtr,&j,root, &iHolder); 
                                j++;iHolder++;
                            }else if(tempArr[j]==42){                                       //if value ang current value, THIS IS FOR OPTIMIZATION
                                
                                //j++;iHolder++;
                                int tempI = iHolder +1;
                                //printf("\t\tValue dito %s\n",root[tempI].str);
                                if(isArithmeticOperator2(root,tempI)==1){                                                       
                                    //printf("yes naman \n");
                                    //printf("v1: %s %s %s \n", root[iHolder].str, root[iHolder+1].str, root[iHolder+2].str);
                                    //printf("v2: %d %d %d \n", tempArr[j], tempArr[j+1], tempArr[j+2]);

                                   // j++;iHolder++;
                                    
                                    value = atoi(root[iHolder].str);
                                    value2 = atoi(root[iHolder+2].str);

                                    if(tempArr[j+1] == 10){
                                        value = value + value2;
                                        //printf("value: %d \n", value);    
                                    }else if(tempArr[j+1] == 11){
                                        value = value - value2;
                                        //printf("value: %d \n", value);
                                    }else if(tempArr[j+1] == 12){
                                        value = value * value2;
                                        //printf("value: %d \n", value);
                                    }else if(tempArr[j+1] == 13){
                                        value = value / value2;
                                        //printf("value: %d \n", value);
                                    }else if(tempArr[j+1] == 14){
                                        value = value % value2;
                                        //printf("value: %d \n", value);
                                    }

                                    add_evaluated_expr(value);

                                    j = j + 3;
                                    iHolder = iHolder + 3;
                               }else{
                                    writeToFile2(tempArr,j,root, iHolder);
                                    j++;iHolder++;
                               }

                            }else{               //added this one
                                    writeToFile2(tempArr,j,root, iHolder);
                                    j++;iHolder++;  
                            }
                        }//end of while
                        if(tempArr[j]==40){
                            writeToFile2(tempArr,j,root, iHolder);
                        }
                    }//end of if
    *currJ = j;
    *currIHolder = iHolder;
}

//print tree traversal
void display_tree(Token *root, int tokNum){
    
    int i=0;
    int arr[MAXWORD];
    int tempArr[MAXWORD];
    int out[2];
    int tempCtr=0;                            //temporary counter
    int iHolder;
    int currPos;
    int prevPos = root[0].pos;
    int checker;
    int a=0;
    int numElems=0;
    
    if(root!=NULL){
        
        ofstream fp2("translated.c");
        if(fp2.is_open()){
            fp2 << "#include<stdio.h>\n\n";
            fp2 << "#include<string.h>\n\n";
            fp2.close();
        
            

        while(i!=tokNum){
            //if input is a SHOW/PRINTF statement
            if(root[i].type==44){                                       
                
                tempArr[tempCtr] = root[i].type;
                iHolder=i;
                i++;                                                   //increment to get next token
                tempCtr++;
                while(root[i].type!=34){                                //until # or end of line is not found, save the line to temp
                        tempArr[tempCtr] = root[i].type;
                        i++;
                        tempCtr++;   
                    
                }
                tempArr[tempCtr] = root[i].type;                        //end of statement symbol #
                
                //for(int j=0;j<=tempCtr;j++){
		//	printf("\t%d - - - %d",tempArr[j],j);

                int j=0;
                while(j<=tempCtr){
			//printf("\t\ttemp:%d -- %d",tempArr[j], j);
		  //printf("%d",j);                  
		printf_analyze(tempArr, tempCtr,&j,root, &iHolder);         //while the whole array is not traversed yet, analyze and convert
                j++;iHolder++;        
                }
                i++;
                tempCtr=0;                                                      //reinitialize temporary vars
                iHolder=0;
            
            //if input is a COLLECT statement
            }else if(root[i].type==45){
                tempArr[tempCtr] = root[i].type;
                iHolder=i;
                i++;                                                   //increment to get next token
                tempCtr++;

                while(root[i].type!=34){                                //until # or end of line is not found, save the line to temp
                        tempArr[tempCtr] = root[i].type;
                        i++;
                        tempCtr++;   
                    
                }
                tempArr[tempCtr] = root[i].type;       

                int j=0;
                while(j!=tempCtr){                     
                     if(tempArr[j]==50){
                       print_format_code(tempArr,j,root, iHolder);
                       add_ampersand();
                       writeToFile2(tempArr,j,root, iHolder);
                       add_end_sym_p();
                        j++;iHolder++;
                     }else{
                        writeToFile2(tempArr,j,root, iHolder);
                        j++;iHolder++;
                     }
                     
                }
                if(tempArr[j]==34){
                    writeToFile2(tempArr,j,root, iHolder);
                }
                i++;
                tempCtr=0;
                iHolder=0;
            //if input is an IF-ELSE/MATCHBOARD statement
            }else if(root[i].type==37){                                       //if input is a matchbox statement

                tempArr[tempCtr] = root[i].type;
                iHolder=i;
                i++;                                                   //increment to get next token
                tempCtr++;
                while(root[i].type!=32){                                //until ] or end of matchbox is not found
                    tempArr[tempCtr] = root[i].type;
                    i++;
                    tempCtr++;       
                }                        

                tempArr[tempCtr] = root[i].type;
        
                int j=0;
                while(j!=tempCtr){
                    ifelse_analyze(tempArr, tempCtr,&j,root, &iHolder);    
                }//end of while
                i++;
               tempCtr=0;
               iHolder=0;
               //FUNCTION CALL INSIDE MAIN
            }else if(root[i].type==41){                                                              //function call inside main
               // tempArr[tempCtr] = root[i].type;
                iHolder=i;
                
                i++;                                                        //move to next token - Function name
                iHolder++;
                //tempCtr++;
                while(root[i].type!=34){                                    //until # 
                    tempArr[tempCtr] = root[i].type;
                    i++;
                    tempCtr++;       
                }
                tempArr[tempCtr] = root[i].type;                            //#
                

                int j=0;  
                while(j!=tempCtr){
                    
                    if(tempArr[j]==50 && tempArr[j+1]==57){                 //if current token is func name and next token is GIVE
                       //printf("dito pumasok %d %d %s", tempArr[j], tempArr[j+1],root[iHolder].str); 
                        add_newline();

                        writeToFile2(tempArr,j,root, iHolder);                  //write function name to file
                        add_func_delims2();
                        j++;iHolder++;
                        j++;iHolder++;
                        //printf("dito pumasok %d %d %s", tempArr[j], tempArr[j+1],root[iHolder].str); 
                        if(tempArr[j]==50 && tempArr[j+1]==30){                                 //multi val/variable passing
                          //  printf("IKAW ANG NAPILI %d %d", tempArr[j], tempArr[j+1]);
                            while(tempArr[j]!=34){
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                            }
                            add_end_sym_p();
                            if(tempArr[j]==34){
                                writeToFile2(tempArr,j,root, iHolder);
                            }
                           // j++;iHolder++;

                        }
                        if(tempArr[j]==50 && tempArr[j+1]==34){                                                                //1 variable lang

                            //printf("DITO NAMANA %d, %d %s", tempArr[j],tempArr[j+1],root[iHolder].str);
                            writeToFile2(tempArr,j,root, iHolder);
                            j++;iHolder++;
                            add_end_sym_p();
                            writeToFile2(tempArr,j,root, iHolder);                              //variable
                            
                           
                        }
                        if(tempArr[j]==34){
                          //  writeToFile2(tempArr,j,root, iHolder);
                        }
                        //j++;iHolder++;                      
                    }/*else if(tempArr[j]==50 && tempArr[j+1]==34){                                                  //walang GIVE as next token
                        add_newline();
                        writeToFile2(tempArr,tempCtr,root, iHolder);
                        add_func_delims();
                        j++;iHolder++;
                    }*/else{
                        
                        writeToFile2(tempArr,j,root, iHolder);
                        j++;iHolder++;
                        add_func_delims();
                        writeToFile2(tempArr,j,root, iHolder);
                        add_newline();
                    }
                }
                i++;
                tempCtr=0;
                iHolder=0;
                //add_newline();
                //writeToFile2(tempArr,tempCtr,root, iHolder);
                //add_func_delims();
                //i++;
            //if input is a FUNCTION / OPEN_PLAYPEN
            }else if(root[i].type==6){                                                              //there's a function 
                tempArr[tempCtr] = root[i].type;
                iHolder=i;
                i++;                                                                                 //increment to get next token
                tempCtr++;
                while(root[i].type!=7){                                                               //while not end of function (close_playpen)   
                    tempArr[tempCtr] = root[i].type;
                    i++;
                    tempCtr++;       
                }                        
                tempArr[tempCtr] = root[i].type;
                
                int j=0;
                while(j!=tempCtr){
                    if(tempArr[j]==6){                                                              //IF OPEN_PLAYPEN
                        writeToFile2(tempArr,j,root, iHolder);
                        add_end_delim_if();
                        add_newline(); 
                        add_newline();
                        j++;iHolder++;
                        while(tempArr[j]!=7){

                            if(tempArr[j-1]==6){                                                      //if prev. token is OPEN_PLAYPEN, this is the function name
                                writeToFile2(tempArr,j,root, iHolder);
                                add_func_delims2();
                                j++;iHolder++;
                                if(tempArr[j]==35 && tempArr[j+1]==58){                                                     //if colon, get next token if = GET
                                   // printf("COLON ITO");
                                    j++;iHolder++;                                                     //token is GET
                                    j++;iHolder++;                                                      //var after get
                                    while(tempArr[j]!=34){
                                      //  printf("var: %s \n",root[iHolder].str);
                                        string func_type;
                                        if(tempArr[j]!=30){
                                            func_type = variableIdentifiers.find(root[iHolder].str)->second;
                                            print_data_type_for_func(func_type);
                                        }
                                        //if(root[iHolder].str != ","){
                                            
                                        //}
                                       // printf("type: %s \n", func_type.c_str());
                                        writeToFile2(tempArr,j,root, iHolder);
                                        j++;iHolder++;
                                    }
                                    add_colon_sym();
                                    if(tempArr[j]==34){
                                        j++;iHolder++;
                                    }
                                    
                                }
                            }else if(tempArr[j-1]!=6 && tempArr[j]!=44 ) {
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                            }

                            if(tempArr[j]==44){                                                     //may print sa loob ng function
                                printf_analyze(tempArr, tempCtr,&j,root, &iHolder); 
                                j++;iHolder++;
                            }
                            if(tempArr[j]==37){                                                     //may if else sa oob ng function
                                ifelse_analyze(tempArr, tempCtr,&j,root, &iHolder);
                                j++;iHolder++;
                                if(tempArr[j]==32){
                                j++;iHolder++;
                                }
                            }
                            if(tempArr[j]==39){                                                    //may loop sa loob ng func
                                loop_analyze(tempArr, tempCtr,&j,root, &iHolder);
                                j++;iHolder++;
                            }
                            
                            if(tempArr[j]==43){                                                     
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                            }
                            if(tempArr[j]==45){                                             //may collect sa loob ng function
                                writeToFile2(tempArr,j,root, iHolder);
                                j++;iHolder++;
                                while(tempArr[j]!=34){
                                    if(tempArr[j]==50){
                                        print_format_code(tempArr,j,root, iHolder);
                                        add_ampersand();
                                        writeToFile2(tempArr,j,root, iHolder);
                                        add_end_sym_p();
                                        j++;iHolder++;
                                    }
                                }
                                if(tempArr[j]==34){
                                  //  writeToFile2(tempArr,j,root, iHolder);
                                }
                                
                            }
                        }
                        if(tempArr[j]==7){
                            
                        }
                    }

                }
                i++;
                tempCtr=0;
                iHolder=0;
            //token is a loop
            }else if(root[i].type==39){                                                             //if token is HOOLA
                tempArr[tempCtr] = root[i].type;
                iHolder=i;
                i++;                                                                                 //increment to get next token
                tempCtr++;
                while(root[i].type!=40){                                                               //while not end of loop   
                    tempArr[tempCtr] = root[i].type;
                    i++;
                    tempCtr++;       
                }                        
                tempArr[tempCtr] = root[i].type;
                
                int j=0;
                while(j!=tempCtr){

                    //if there's print inside the loop
                    loop_analyze(tempArr, tempCtr,&j,root, &iHolder);
                
                     
                }//end of while
                
                i++;
                tempCtr=0;
                iHolder=0;
            //OTHER CASES
            }else{
                checker=1;                                          //reinitialize counters
                numElems=0;
                currPos = root[i].pos;
                while(checker==1){
                    if(prevPos==currPos){
                        arr[a] = root[i].type;
                        numElems=a;
                       
                        a++;
                        writeToFile2(arr,numElems,root, i);                        //pass array and number of current token
                        
                                
                        checker--;
                        i++;
                    }else{
                       // printf("CHANGE VALUE OF POS\n");
                        prevPos = currPos;
                        a=0;

                    }
                
                }   //end of while

            }//end of else
        
        }//end of for
        
        }else{
            printf("unable to write to file");
        }
    }//end of if

}

void display_tree2(Token *root, int count){
	int i;

	for(i=0;i<count;i++){
		printf("\t%s", root[i].str);
		printf("\t%d", root[i].type);
		printf("\t%d\n", root[i].pos);	
	}

}

/*------------------------------------------END OF IR FUNCTIONS------------------------------------------------------------------*/
int main(){
    string linestream;

    ifstream fp1("samplecode.txt");
    if(!fp1.is_open()){
	    printf("ERROR: Cannot open file.");
	return 1;
    }
    
    make_tokenmap();

    //READ all the codes
    for(int i=0;getline(fp1,linestream);i++){
	if(scan_code(linestream,lineNum)){
	    printf("Cannot compile the program. \n");	    
	}
	code += linestream + "\n";
    }
    
    toks = (Token*) malloc(tokcount*sizeof(Token));
    lineNum=1;
    
    //GET tokens
    do{
	    tokcount++;
	    toks = (Token*)realloc(toks,tokcount*sizeof(Token)); 
	    toks[tokcount-1]= anlzr(); 
    }while(toks[tokcount-1].type != tokEND);
    
    offset=0;
    lineNum=0;
    parser();
    display_tree(toks, tokcount-1);
    string var, type;
    for (std::map<string,string>::iterator it=variableIdentifiers.begin(); it!=variableIdentifiers.end(); ++it){
        var = it->first;
        type = variableIdentifiers.find(it->first)->second;
       // printf("Var : %s is %s! \n", var.c_str(), type.c_str());
    }
}
